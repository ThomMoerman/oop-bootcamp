<?php

/*
There's two groups, both of 10 students. Every student has a name (even Jaqen) and gets a grade. You can have some fun coming up with the content here :-)

Provide an easy way to calculate the average score of a group.
Add a function to move a student from one group to another.
Show the average score of both groups. Move the top student from one group with the lowest scoring student from another. Show the averages again - how were these affected?
*/

class Student
{
    protected string $name;
    protected float $grade;

    public function __construct(string $name, float $grade)
    {
        $this->name = $name;
        $this->grade = $grade;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGrade(): float
    {
        return $this->grade;
    }
}

class Group
{
    protected array $students = [];

    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    public function removeStudent(Student $student): bool
    {
        $index = array_search($student, $this->students, true);
        if ($index !== false) {
            array_splice($this->students, $index, 1);
            return true;
        }
        return false;
    }

    public function calculateAverageGrade(): float
    {
        $total = 0;
        $count = count($this->students);

        foreach ($this->students as $student) {
            $total += $student->getGrade();
        }

        return $count > 0 ? $total / $count : 0;
    }

    public function getStudents(): array
    {
        return $this->students;
    }
}

// Create students
$studentsGroup1 = [
    new Student("John", 8.5),
    new Student("Emma", 7.8),
    new Student("Tom", 9.2),
    new Student("Sophia", 8.0),
    new Student("Oliver", 7.2),
    new Student("Emily", 9.1),
    new Student("Jacob", 8.7),
    new Student("Mia", 7.9),
    new Student("William", 8.4),
    new Student("Ava", 9.0),
];

$studentsGroup2 = [
    new Student("Liam", 8.3),
    new Student("Isabella", 7.5),
    new Student("Noah", 8.9),
    new Student("Charlotte", 7.1),
    new Student("Ethan", 9.3),
    new Student("Amelia", 8.8),
    new Student("Michael", 7.6),
    new Student("Harper", 8.2),
    new Student("James", 7.7),
    new Student("Abigail", 9.4),
];

// Create groups
$group1 = new Group();
$group2 = new Group();

// Add students to groups
foreach ($studentsGroup1 as $student) {
    $group1->addStudent($student);
}

foreach ($studentsGroup2 as $student) {
    $group2->addStudent($student);
}

// Calculate the average score of both groups
$averageGradeGroup1 = $group1->calculateAverageGrade();
$averageGradeGroup2 = $group2->calculateAverageGrade();

echo "Average grade for Group 1: " . $averageGradeGroup1 . "\n";
echo '<br>';
echo "Average grade for Group 2: " . $averageGradeGroup2 . "\n";
echo '<br>';

// Find the top student in Group 1
$topStudentGroup1 = null;
foreach ($group1->getStudents() as $student) {
    if ($topStudentGroup1 === null || $student->getGrade() > $topStudentGroup1->getGrade()) {
        $topStudentGroup1 = $student;
    }
}

// Find the lowest scoring student in Group 2
$lowestStudentGroup2 = null;
foreach ($group2->getStudents() as $student) {
    if ($lowestStudentGroup2 === null || $student->getGrade() < $lowestStudentGroup2->getGrade()) {
        $lowestStudentGroup2 = $student;
    }
}

// Move the top student from Group 1 to Group 2
if ($topStudentGroup1 !== null && $lowestStudentGroup2 !== null) {
    $group1->removeStudent($topStudentGroup1);
    $group2->removeStudent($lowestStudentGroup2);
    $group2->addStudent($topStudentGroup1);
    $group1->addStudent($lowestStudentGroup2);
    echo "Moved top student " . $topStudentGroup1->getName() . " from Group 1 to Group 2.\n";
    echo '<br>';
    echo "Moved lowest scoring student " . $lowestStudentGroup2->getName() . " from Group 2 to Group 1.\n";
    echo '<br>';
}

// Recalculate the average grades after the student transfer
$averageGradeGroup1 = $group1->calculateAverageGrade();
$averageGradeGroup2 = $group2->calculateAverageGrade();

echo "Average grade for Group 1 after transfer: " . $averageGradeGroup1 . "\n";
echo '<br>';
echo "Average grade for Group 2 after transfer: " . $averageGradeGroup2 . "\n";
?>
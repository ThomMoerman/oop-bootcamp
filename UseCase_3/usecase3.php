<?php

/*
We are preparing three types of content for a website:

Articles
Ads
Vacancies
All of those have a title and text. When showing the title, they are modified as follows: articles remain as they are, ads are shown in all caps and vacancies are appended with " - apply now!". The original title should still be retrievable, so no modification is permanent.

Have an array with two articles, one ad and one vacancy. Use this array to show all content types (title + text).

Bonus: an article can be marked as "breaking news". If this is the case, the title is prepended with "BREAKING: ". Extra bonus: display all the content with the appropriate html tags.
*/
class Content
{
    protected string $title;
    protected string $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getHTML(): string
    {
        return '<h2>' . htmlspecialchars($this->getTitle()) . '</h2>' .
            '<p>' . htmlspecialchars($this->getText()) . '</p>';
    }
}

class Article extends Content
{
    protected bool $isBreakingNews;

    public function __construct(string $title, string $text, bool $isBreakingNews = false)
    {
        parent::__construct($title, $text);
        $this->isBreakingNews = $isBreakingNews;
    }

    public function getTitle(): string
    {
        if ($this->isBreakingNews) {
            return 'BREAKING: ' . $this->title;
        }
        return $this->title;
    }
}

class Ad extends Content
{
    public function getHTML(): string
    {
        return '<h3>' . htmlspecialchars($this->getTitle()) . '</h3>' .
            '<p>' . htmlspecialchars($this->getText()) . '</p>';
    }
}

class Vacancy extends Content
{
    public function getHTML(): string
    {
        return '<h4>' . htmlspecialchars($this->getTitle()) . '</h4>' .
            '<p>' . htmlspecialchars($this->getText()) . '</p>';
    }
}

// Create content instances
$articles = [
    new Article("Article 1", "This is the content of Article 1."),
    new Article("Article 2", "This is the content of Article 2.", true)
];

$ads = [
    new Ad("Ad 1", "This is the content of Ad 1.")
];

$vacancies = [
    new Vacancy("Vacancy 1", "This is the content of Vacancy 1.")
];

// Combine all content types into a single array
$contentArray = array_merge($articles, $ads, $vacancies);

// Display the content with appropriate HTML tags
foreach ($contentArray as $content) {
    echo $content->getHTML() . "\n";
}

?>

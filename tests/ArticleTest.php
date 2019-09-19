<?php
	
use PHPUnit\Framework\TestCase; 

class ArticleTest extends \PHPUnit\Framework\TestCase {

	protected $article;

	protected function setUp() {
		$this->article = new App\Article;
	}

	public function testTitleIsEmptyByDefault() {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmtpyWithNoTile() {
    	$this->assertSame($this->article->getSlug(), "");
    }

    // public function testSlugHasSpacesReplacedByUnderscores() {
    // 	$this->article->title = "An example article";

    // 	$this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function testSlugHasWhitespaceReplaceBySingleUnderscore() {
    // 	$this->article->title = "An     example  \n   article";

    // 	$this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function testSlugdoesNotStartOrEndWithAnUnderscore() {
    // 	$this->article->title = " An example article ";

    // 	$this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function testSlugDoesNotHaveAnyNonWordCharacters() {
    // 	$this->article->title = "Read! This! Now!";

    // 	$this->assertEquals($this->article->getSlug(), "Read_This_Now");
    // }
    
    public function provider() {
    	return array(
    		"testSlugHasSpacesReplacedByUnderscores" => array("An example article", "An_example_article"),
    		"testSlugHasWhitespaceReplaceBySingleUnderscore" => array("An     example  \n   article", "An_example_article"),
    		"testSlugdoesNotStartOrEndWithAnUnderscore" => array(" An example article ", "An_example_article"),
    		"testSlugDoesNotHaveAnyNonWordCharacters" => array("Read! This! Now!", "Read_This_Now"),
    	);
    }

    /**
     * @dataProvider provider
     */
    public function testSlug($title, $slug) {
    	$this->article->title = $title;

    	$this->assertEquals($this->article->getSlug(), $slug);
    }
}
	
?>
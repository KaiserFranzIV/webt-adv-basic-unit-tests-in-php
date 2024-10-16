<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class videoTest extends TestCase{
    protected string $name = "TestVideo";
    protected string $source = "https://www.youtube.com/embed/testvideo";
    protected string $srcvim = "https://player.vimeo.com/video/testvideo";
    public function testYoutubeGetName()
    {
        $youtube = new youtube($this->name, $this->source);
        $result = $youtube->getName();
        $this->assertEquals("Youtube | TestVideo", $result);
    }

    public function testYoutubeGetSource(){
        
        $youtube = new youtube($this->name, $this->source);

        $result = $youtube->getSource();
        $this->assertEquals($this->source, $result);
    }

    public function testYoutubeGetHTMLCode(){
        $youtube = new youtube($this->name, $this->source);
        $html = $youtube->getHTMLCode();
        $expectedHTML = "<figure>
                    <figcaption>Youtube | TestVideo</figcaption>
                    <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/testvideo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>
                </figure><br>\n";
        
        $this->assertEquals($expectedHTML, $html);
    }

    public function testVimeoGetName(){
        $vimeo = new vimeo($this->name, $this->srcvim);
        $result = $vimeo->getName();
        $this->assertSame("Vimeo | TestVideo", $result);
    }

    public function testVimeoGetSource(){
        $vimeo = new vimeo($this->name, $this->srcvim);
        $result = $vimeo->getSource();
        $this->assertEquals($this->srcvim, $result);
    }

    public function testVimeoGetHTMLCode(){
        $vimeo = new vimeo($this->name, $this->srcvim);
        $html = $vimeo->getHTMLCode();
        $expectedHTML = "<figure>
                    <figcaption>Vimeo | TestVideo</figcaption>
                    <iframe width=\"560\" height=\"315\" src=\"https://player.vimeo.com/video/testvideo\" title=\"Vimeo video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>
                </figure><br>\n";
        $this->assertEquals($expectedHTML, $html);
    }

    public function testCanCreateYoutubeFromNameAndSource(): void
    {
        $this->assertInstanceOf(
            Youtube::class,
            Youtube::fromString($this->name, $this->source)
        );
    }
    public function testCanCreateVimeoFromNameAndSource(): void
    {
        $this->assertInstanceOf(
            Vimeo::class,
            Vimeo::fromString($this->name, $this->srcvim)
        );
    }
    
}
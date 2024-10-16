<?php
interface video {
    function getName();
    function getSource();
    function getHTMLCode();
}

abstract class film implements video{
    protected string $name;
    protected string $source;

    function __construct(string $name, string $source){
        $this->name = $name;
        $this->source = $source;
    }
    public function getSource(){
        return $this->source;
    }
    abstract public function getName():string;
    abstract public function getHTMLCode():string;

}

class youtube extends film{
    function __construct(string $name, string $source) { parent::__construct($name,$source);}
    public function getSource() : string{return parent::getSource();}
    public function getName() : string{
        return 'Youtube | ' . $this->name;
    }
    public function getHTMLCode() : string {
        return "<figure>
                    <figcaption>". $this->getName() . "</figcaption>
                    <iframe width=\"560\" height=\"315\" src=\"". $this->getSource() ."\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>
                </figure><br>\n";
    }
    public static function fromString($name,$source):self{
        return new self($name,$source);
    }
    public function ensureAreStrings():void{
        if (!filter_var($name, FILTER_STRING)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid Argument',
                    $name
                )
            );
        }
    }
}

class vimeo extends film{
    function __construct($name, $source) { parent::__construct($name,$source);}
    public function getSource() : string {return parent::getSource();}
    public function getName(): string{
        return 'Vimeo | ' . $this->name;
    }
    public function getHTMLCode(): string{
        return "<figure>
                    <figcaption>". $this->getName() ."</figcaption>
                    <iframe width=\"560\" height=\"315\" src=\"". $this->getSource() ."\" title=\"Vimeo video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>
                </figure><br>\n";
    }
    public static function fromString($name,$source):self{
        return new self($name,$source);
    }
}

<?php
function parse_recursive(SimpleXMLElement $element, $level = 0)
{
        $indent     = str_repeat("\t", $level); // determine how much we'll indent
        
        $value      = trim((string) $element);  // get the value and trim any whitespace from the start and end
        $attributes = $element->attributes();   // get all attributes
        $children   = $element->children();     // get all children
        
        echo "{$indent}Parsing '{$element->getName()}'...".PHP_EOL;
        if(count($children) == 0 && !empty($value)) // only show value if there is any and if there aren't any children
        {
                echo "{$indent}Value: {$element}".PHP_EOL;
        }
        
        // only show attributes if there are any
        if(count($attributes) > 0)
        {
                echo $indent.'Has '.count($attributes).' attribute(s):'.PHP_EOL;
                foreach($attributes as $attribute)
                {
                        echo "{$indent}- {$attribute->getName()}: {$attribute}".PHP_EOL;
                }
        }
        
        // only show children if there are any
        if(count($children))
        {
                echo $indent.'Has '.count($children).' child(ren):'.PHP_EOL;
                foreach($children as $child)
                {
                        parse_recursive($child, $level+1); // recursion :)
                }
        }
        
        echo $indent.PHP_EOL; // just to make it "cleaner"
}

$xml = new SimpleXMLElement('simple.xml', null, true);

parse_recursive($xml);
?>
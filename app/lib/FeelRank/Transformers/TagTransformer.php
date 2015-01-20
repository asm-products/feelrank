<?php namespace FeelRank\Transformers;

class TagTransformer {
    
    public function transform($tag)
    {
        $symbols = ["+",",",".","'","\"","&","!","?",":",";","#","~","=","/","$","£","^","(",")","_","<",">","*","@","%","[","]","{","}","|","-"];
		
		$transformed_tag = str_replace($symbols, '', str_replace(' ', '', strtolower($tag)));
		
		return $transformed_tag;
    }
}
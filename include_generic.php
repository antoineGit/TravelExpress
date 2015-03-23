<?php
class ModuleGeneric{
	protected $title;
	protected $controler;
	

	public function getTitle()
	{
		return $this->title;
	}
	
	public function display()
	{
		$this->controler->display();
	}
}



class ControlerGeneric
{
	protected $classView;
	protected $functionView;
	protected $paramsfunctionView;
	protected $title;
	
	
	public function display()
	{
		call_user_func_array(array($this->classView, $this->functionView), $this->paramsfunctionView);
	}
	
	public function constructView ($class, $function, $paramTab)
	{
		if(is_array($paramTab)){
			$this->classView = $class;
			$this->functionView = $function;
			$this->paramsfunctionView = $paramTab;
		}else{
			throw new ControlerGenericException("empty tab ControlerGeneric constructView");
		}
		
	}
	
	public function getTitle ()
	{
		return $this->title;
	}
	

}

 class ControlerGenericException extends Exception{}




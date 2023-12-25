<?php
   // modelo 

   class Funcionario {

        // atributos
        public $name = null;
        public $telefone = null;
        public $numberchilds = null;
        public $cargo = null;
        public $salrio = null;

        // metodos
        public function __construct($name, $telefone, $numberchilds, $cargo, $salrio) { 
            $this->name = $name;
            
            
        }   

        //set universal
        function __set($name, $value){
            $this->$name = $value;
        }

        function __get($name){
            return $this->$name;
        }

        function resumirCadFunc(){
            return 'Resumo de cadastro';
        }

        function modificaNumFilhos(){
            return '';  
        }

       
   }

   $y = new Funcionario();
   echo  $y->resumirCadFunc();

?>
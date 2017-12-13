<?php
/*
    MIT License
    Copyright (c) 2017 FuriosoJack

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
 */

namespace FuriosoJack\SorthIP;
use FuriosoJack\MrBinaryTree\MrBinaryTree;


/**
 * Ordena un listado de ip o subredes 
 * 
 * Es importante tener en cuenta que si existe en el arreglo varioas subredes o ip iguales 
 * al final del procesamiento solo se vera reflejado una subred o ip de los repetidos ya que 
 * a la hora de hacer el ordenamiento la ip o subred sera usada como key en un arreglo
 * necesario para hacer el ordenamiento por que al existir el mismo key el nuevo valor reemplazara al anterior
 * 
 * @author Juan Diaz - FuriosoJack <http://blog.furiosojack.com/> 
 */
class SorthIP {
    
    protected $listAdresses;
    
    protected $tree;    

    /**
     * 
     * @param array $list lista de direcciones ip o subnets
     * @param bool $isSubnet si es una subnet debe ser true de lo contrario no hace falta especificarlo
     */
    public function __construct(array $list, bool $isSubnet = false)
    {
        $this->listAdresses = $list;
        
        $isSubnet ? $this->subnetsToIps(): null; //Si es una lista de subnets se conviernte en ips
        
        $this->tree = new MrBinaryTree();
        $this->buildTree();
    }
    
    /**
     * Convierte la lista de direcciones subnet en direcciones sin sufijo
     */
    protected function subnetsToIps()
    {
        for ($index = 0; $index < count($this->listAdresses); $index++) {
            $this->listAdresses[$index] = explode('/', $this->listAdresses[$index])[0];
        }
    }
    
    /**
     * Convierte una ipaddress o subnet tipo string en un valor entero
     * @param string $address
     * @return string se retorna como estring para usarle luego como key
     */   
    protected function convertToInteger(string $address) : float
    {
        $resul = 0;
        
        //Se divide la ip por los octetos
        $localArrayAdress = explode('.', $address);
        
        /*
         * Se recorre cada seccion del array
         * Cada octeto(item del arreglo) se multiplica por ( 255 elevalo al numero de octetos a la izquierda del octeto que se esta actualmente)
         * Ejemplo: 192.168.0.1 =>  192 * 255^3 + 168 * 255^2 + 0 * 255^1 + 1 * 255^0 
         * 
         */
        for ($i=0; $i < 4; $i++){
            
            $resul = $resul + ( $localArrayAdress[$i] * pow( 255, ( 4 - ( $i + 1) ) ) );
           
        }        
        
        return $resul;
        
    }
    
    /**
     * Contrulle el arbol recorriendo el arreglo de direcciones y añadiendo los nodos al arbol
     */
    protected function buildTree()
    {
        foreach ($this->listAdresses as $address){
            $keyAdress = $this->convertToInteger($address);
            $this->tree->addNode($keyAdress, $address);            
        }
    }

    /**
     * retorna la lista de direcciones ordenadas de menor a mayor
     * @return array
     */
    public function orderAsc(): array
    {              
       $this->tree->inAsc($this->tree->getRoot());      
       return $this->tree->getLisOrderedList();      
    }
    
    /**
     * retorna la lista de direcciones ordenadas de mayor a menor
     * @return array
     */
    public function orderDesc(): array
    {
        $this->tree->inDesc($this->tree->getRoot());
        return $this->tree->getLisOrderedList();
    }
    
}


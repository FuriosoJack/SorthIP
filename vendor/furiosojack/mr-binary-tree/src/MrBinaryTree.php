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

namespace FuriosoJack\MrBinaryTree;

use FuriosoJack\MrBinaryTree\Node;
/**
 * Ordena un array de valores enteros
 *
 * @author Juan Diaz - FuriosoJack <http://blog.furiosojack.com/> 
 */
class MrBinaryTree
{
   protected $root;   
   protected $newList;
   
   /**
    * Ordena un array
    */
   public function __construct()
   {
       $this->newList = array();
   }
   
   /**
    * Retorna el nodo raiz
    * @return FuriosoJack\MrBinaryTree\Node node
    */
   public function getRoot()
   {
       return $this->root;
   }
   
   /**
    * Añade un nodo al arbol
    * @param type $key
    * @param type $value
    */
   public function addNode($key, $value)
   {
       //Se crea un nodo temporal
       $nodeTMP = new Node($key, $value);
       
       //Se verifica si el nodo raiz es nulo para saber si el nodo actual 
       //va hacer el raiz
       if(!is_null($this->root)){
           
           //Nodo actual
           $currentNode = $this->root;
           
           //Se recorreo el arbol
           while (!is_null($currentNode)){
               
               //Se valida hacia que lado del arbol debe ir el nodo temporal
               if($currentNode->getKey() > $key){
                   //Como el valor del nodo actual es mayor al valor a insertar se hace el recorrido por la izquierda
                   
                   //se valida si se llego al ultimo nodo
                   if(!is_null($currentNode->getSonLeft())){
                       //Como no se llego al ultimo nodo se cambia el puntero
                       $currentNode = $currentNode->getSonLeft();
                   }else{
                       //Al llegar al ultimo nodo que es null, en este lugar se va a insertar el nodo temporal
                       $nodeTMP->setFather($currentNode);
                       $currentNode->setSonLeft($nodeTMP);                       
                       break;
                   }
               }else{
                   if(!is_null($currentNode->getSonRight())){
                       $currentNode = $currentNode->getSonRight();
                   }else{
                       $nodeTMP->setFather($currentNode);
                       $currentNode->setSonRight($nodeTMP);
                       break;
                   }
               }
           }               
           
       }else{
           $this->root = $nodeTMP;
       }
   }
   
   /**
    * Hace el recorrido del arbol de menor a mayor
    * @param FuriosoJack\MrBinaryTree\Node $origin
    */
   public function inAsc($origin)
   {
       if(!is_null($origin)){
           $this->inAsc($origin->getSonLeft());          
           
           $this->inAsc($origin->getSonRight());
       }
   }
   
   /**
    * Hace el recorrido del arbol de mayor a menor
    * @param FuriosoJack\MrBinaryTree\Node $origin
    */
   public function inDesc($origin)
   {
       if(!is_null($origin)){
           $this->inDesc($origin->getSonRight());
           array_push($this->newList, $origin->getValue());
           $this->inDesc($origin->getSonLeft());           
       }
   }
   
   /**
    * Retorna la lista de forma ordenada
    * @return array
    */
   public function getLisOrderedList(): array
   {
       return $this->newList;
   }	
}

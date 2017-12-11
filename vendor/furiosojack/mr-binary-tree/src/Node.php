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

/**
 * Nodo base del arbol
 *
 * @author Juan Diaz - FuriosoJack <http://blog.furiosojack.com/> 
 */
class Node
{
    private $sonRight;
    private $sonLeft;
    private $father;
    private $key;
    private $value;
    
    /**
     * Nodo base del arbol
     * @param type $key
     * @param type $value
     */
    public function __construct($key, $value)
    {        
        $this->key = $key;
        $this->value = $value;
    }
    
     /**
      * retorna el nodo hijo izquierdo
      * @return FuriosoJack\MrBinaryTree\Node
      */
    public function getSonLeft()
    {
        return $this->sonLeft;
    }

    /**
     * retorna el nodo padre
     * @return FuriosoJack\MrBinaryTree\Node 
     */
    public function getFather()
    {
        return $this->father;
    }

    /**
     * retorna el key
     * @return type
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * retorna el valor
     * @return type
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * inserta el nodo izquierdo
     * @param FuriosoJack\MrBinaryTree\Node $sonLeft
     */
    public function setSonLeft($sonLeft)
    {
        $this->sonLeft = $sonLeft;
    }

    /**
     * inserta el nodo padre
     * @param FuriosoJack\MrBinaryTree\Node $father
     */
    public function setFather($father)
    {
        $this->father = $father;
    }

    /**
     * inseta el key 
     * @param type $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    
    /**
     * inserta el valor
     * @param type $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    /**
     * retorna el nodo del hijo derecho
     * @return FuriosoJack\MrBinaryTree\Node
     */
    public function getSonRight()
    {
        return $this->sonRight;
    }
    
    /**
     * inserta el nodo del hijo derecho
     * @param FuriosoJack\MrBinaryTree\Node $sonRigh
     */
    public function setSonRight($sonRigh)
    {
        $this->sonRight = $sonRigh;
    }


}

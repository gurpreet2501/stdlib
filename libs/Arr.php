<?php
// for reference
// doctrine\collections\lib\Doctrine\Common\Collections\ArrayCollection.php

import('String');

class Arr
{
    // Storage Box
    protected $box = array();
    private $DOT = '.';

    static public function init(Array $data)
    {
        $c = __class__;
        return new $c($data);
    }


    static public function ref(Array &$data)
    {
        $c = __class__;
        return new $c(Null, $data);
    }


    public function __construct($data = Null, &$by_ref = Null)
    {
        if ($data !== Null)
            $this->box = $data;
        else
            $this->box = &$by_ref;
    }

    public function get($key, $default)
    {
        $ret = Null;

        if (String::has($key, $this->DOT))
        {
            $ret = $this->nested_has($key, True);
        }
        else
        {
            if (isset($this->box[$key]))
                $ret = $this->box[$key];
    
        }

        return ($ret === Null || $ret === '') 
               ? $default
               : $ret;
    }


    public function has($key)
    {
        return String::has($key, $this->DOT) 
               ? $this->nested_has($key)
               : isset($this->box[$key]);
    }

    protected function nested_has($tokens, $return_data = False)
    {
        $ref = &$this->box;
        $key_exists = True;

        foreach (explode($this->DOT, $tokens) as $token)
        {
            if (isset($ref[$token]))
            {
                $ref = &$ref[$token];
            }
            else
            {
                $key_exists = False;
                break;
            }
        }
        
        if ($return_data)
        {
            return $key_exists ? $ref : Null;
        }

        return $key_exists;
    }

    public function push($value)
    {
        $this->box[] = $value;
    }
    
    public function set($key, $value)
    {
        if (String::has($key, $this->DOT))
            $this->nested_set($key, $value);
        else
            $this->box[$key] = $value;


        return True;
    }

    /**
     * @param $key String
     * @param $value Mix
     **/ 
    protected function nested_set($key, $value)
    {
        $ref = &$this->box;
        $tokens = explode($this->DOT, $tokens);
        $t_count = count($tokens)-1;

        foreach ($tokens as $key => $token)
        {
            // index is not defined create new one
            if (!isset($ref[$token]))
                $ref[$token] = [];
            
            // on last element don't update ref.
            // assign value,and loop will break
            if ($key >= $t_count)
                $ref[$token] = $value;
            else
                $ref = &$ref[$token];

        }

        return True;
    }

    public function remove($key)
    {
        unset($this->box[$key]);

        return True;
    }

    // protected function nested_remove($key)
    // {
    //     unset($this->box[$key]);

    //     return True;
    // }


    public function take()
    {
        $arg = func_get_args();

        if (is_array($arg[0]))
            $arg = $arg[0];

        $ret = array();
        foreach ($arg as $key)
        {
            $val = $this->get($key, Null);
            if ($val !== Null)
                $ret[$key] = $val;
        }

        return $ret;        
    }


    public function all()
    {
        return $this->box;
    }

    public function is_empty($key = Null)
    {
        return $key === Null 
             ? empty($this->box) 
             : empty($this->get($key, Null)) ;
    }

    public function keys()
    {
        return array_keys($this->box);
    }

    public function pop()
    {
        return array_pop($this->box);
    }
    
    // reverse
    // merge 
    // random
    // public function first(){}
    // public function last(){}
    // public function filter(){}
    // public function len(){}

    // public function clear()
    // {
    //     $this->box = array(); 
    // }

    // public function count()
    // {
    //     return count($this->box);
    // }

    /**
     * @sported format Type: string|int|array|object|bool|
     *
     **/ 

    // public function type($key, $type)
    // {
    //     if (!$this->has($key)){
    //         return False;
    //     }

    //     $value = $this->get($key, Null);
    // }
}
<?php

// doctrine\collections\lib\Doctrine\Common\Collections\ArrayCollection.php

import('String');

class Arr
{
    // Storage Box
    private $box = array();
    private $DELIMITER = '.';


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

        if (String::has($key, $this->DELIMITER))
        {
            $ret = $this->doted_has($key, True);
        }
        else
        {
            if (isset($this->box[$key]))
            {
                $ret = $this->box[$key];
            }
        }

        return ($ret === Null || $ret === '') 
               ? $default
               : $ret;


    }

    public function has($key)
    {
        return String::has($key, $this->DELIMITER) 
               ? $this->doted_has($key)
               : isset($this->box[$key]);
    }

    public function take()
    {
        $arg = func_get_args();

        if (is_array($arg[0]))
        {
            $arg = $arg[0];
        }

        $ret = array();
        foreach ($arg as $key)
        {
            $val = $this->get($key, Null);
            if ($vl !== Null)
            {
                $ret[$key] = $val;
            }
        }

        return $ret;        
    }


    protected function doted_has($tokens, $return_data = False)
    {
        $ref = &$this->box;
        $key_exists = True;

        foreach (explode($this->DELIMITER, $tokens) as $token)
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
        $this->box[$key] = $value;
        return True;
    }

    public function all()
    {
        return $this->box;
    }

    // merge 
    // random
    public function first(){}
    public function last(){}
    public function filter(){}
    public function len(){}

    public function clear()
    {
        $this->box = array(); 
    }

    public function count()
    {
        return count($this->box);
    }

    public function remove($key)
    {
        unset($this->box[$key]);

        return True;
    }
}
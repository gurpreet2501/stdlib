<?php

class _Array
{
    // Storage Box
    private $box = [];

    static public function init(Array $data)
    {
        $c = __class__;
        return new $c($data);
    }

    function __construct(Array $data)
    {
        $this->box = $data;
    }


    public function get($key, $default)
    {
        if (isset($this->box[$key]) && $this->box[$key] !== '')
        {
            return $this->box[$index];
        }

        return $default;
    }

    public function take()
    {
        $arg = func_get_args();

        if (is_array($arg[0]))
        {
            $arg = $arg[0];
        }

        $ret = [];
        foreach ($arg as $key)
        {
            if (isset($this->box[$key]))
            {
                $val = $this->box[$key];

                if ($val !== '')
                {
                    $ret[$key] = $val;
                }
            }
        }

        return $ret;        
    }

    public function has($key)
    {
        return isset($this->box[$key]);
    }

    public function push($value)
    {
        $this->box[] = $value;
    }
    
    public function push_at($key, $value)
    {
        $this->box[$key] = $value;
    }

    public function all()
    {
        return $this->box;
    }

    public function first(){}
    public function last(){}
    public function filter(){}
    public function len(){}

    public function clear(){
        $this->box = []; 
    }
    public function count(){
        return count($this->box);
    }
    public function remove($key)
    {
        unset($this->box[$key]);

        return True;
    }
}
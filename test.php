<?php

	class multipleNumber 
	{
    
	    const FALABELLA     = 'Falabella';
	    const IT 		    = 'IT';
	    const INTEGRACIONES = 'Integraciones'; 	

	    public $flagMod = 0; 

	    /**
	     * setMultiple processes the values ​​of an array to assign 
	     * literals according to their multiples [3, 5] or both
	     * @param array $values 
	     */
	    public function setMultiple($values) {

	    	foreach ($values as $key => $value) {

	    		$integration   = -1;
	    		$this->flagMod = 0;

	    		$token = $value;
	    		
	    		if (($this->moduleRest($token, 3) == 0) || ($this->moduleRest($token, 5) == 0)) {

	    			switch ($this->flagMod) {
	    				case 3:
	    					$integration = $this->moduleRest($token, 5);
	    					$token = self::FALABELLA; 
						break;
	    				case 5:
	    					$integration = $this->moduleRest($token, 3);
	    					$token = self::IT; 
						break;    				
	    			}

	    		}

	    		if ($integration == 0)
					$token = self::INTEGRACIONES;

	    		$values[$key] = $token;

	    	}

	    	return $values;

	    }

	    /**
	     * moduleRest 
	     * @param  int $value 
	     * @param  int $mod   value mod [3, 5]
	     * @return int 		  rest module operation
	     */
	    protected function moduleRest($value, $mod) {

	    	$this->flagMod = $mod;

	    	return ($value % $mod);

	    }	

	}

	$multiple = new multipleNumber();

	$data = range(1, 100);

	$data = $multiple->setMultiple($data);	

	$html  = '<table>'.PHP_EOL;
	$html .= '<thead>'.PHP_EOL;
	$html .= '<tr>'.PHP_EOL;
	$html .= '<th>Nro</th>'.PHP_EOL;
	$html .= '<th>Value</th>'.PHP_EOL;
	$html .= '</tr>'.PHP_EOL;
	$html .= '</thead>'.PHP_EOL;

	foreach ($data as $key => $value) {

		$html .= "<tr>".PHP_EOL;
		$html .= "<td>".($key + 1)."</td>".PHP_EOL;
		$html .= "<td>$value</td>".PHP_EOL;
		$html .= "</tr>".PHP_EOL;
		
	}

	$html .= '<table>'.PHP_EOL;
	echo $html;

?>
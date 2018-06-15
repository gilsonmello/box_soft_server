<?php 

if(!function_exists('access')) {
	/**
	 * Access (lol) the Access:: facade as a simple function
	 */
	function access() {
	    return app('App\Services\Access\Access');
	}

}

if(!function_exists('yesOrNo')) {
	/**
	 * @param $value
	 * @return string
	 */
	function yesOrNo($value) {
		return $value == 1 ? trans('strings.yes') : trans('strings.no');
	}
}

if(!function_exists('referencesFlexitest')) {
	/**
	 * @param $value
	 * @return string
	 */
	function referencesFlexitest($value) {
		$rtn = '';
		if($value == 1){
			$rtn = 'Ruim';
		}else if($value == 2){
			$rtn = 'Razoável';
		}else if($value == 3){
			$rtn = 'Bom';
		}else if($value == 4){
			$rtn = 'Muito Bom';
		}else{
			$rtn = 'Não informado';
		}
		return $rtn;
	}

}

if(!function_exists('hasObs')) {
	/**
	 * @param $param
	 * @param $id
	 * @return bool
	 */
	function hasObs($param){
		if(!is_null($param)){
			return $param;
		}
		return '<p style="text-align: center;">----</p>';
	}
}

if(!function_exists('emailExists')) {

	/**
	 * @param $param
	 * @param $id
	 * @return bool
	 */
	function emailExists($param, $id = NULL){
		//Busco o usuário pelo id

	}
}

if(!function_exists('format_money_br')) {

    /**
     * @param $param
     * @param $id
     * @return bool
     */
    function format_money_br($param){
        return 'R$'. number_format($param, 2, ',', '.');
    }
}

if(!function_exists('format_money')) {

    /**
     * @param $param
     * @param $id
     * @return bool
     */
    function format_money($param) {
        $param = str_replace([
            'R$',
            ' '
        ], '', $param);
        $param = str_replace('.', '', $param);
        $param = str_replace(',', '.', $param);
        return $param;
    }
}

if(!function_exists('differenceInMonths')) {

    /**
     * @param $param
     * @param $id
     * @return bool
     */
    function differenceInMonths($date, $date_end) {
        $date = Carbon\Carbon::parse($date);
        $date_end = Carbon\Carbon::parse($date_end);
        return $date->diffInMonths($date_end);
    }
}

if(!function_exists('differenceInDays')) {

    /**
     * @param $param
     * @param $id
     * @return bool
     */
    function differenceInDays($date, $date_end) {
        $date = Carbon\Carbon::parse($date);
        $date_end = Carbon\Carbon::parse($date_end);
        return $date->diffInDays($date_end);
    }
}

if (!function_exists('getValueSession')) {

	/**
	 * @param $request
	 * @param string $name
	 * @param string $test
	 * @param string $submit
	 * @param string $default
	 * @return array
	 */
	function getValueSession($request, $name, $test, $submit, $default) {

		$value = $request->input($name, $test);


		if (($submit != '1') && ($value === $test)) {
			$value = $request->session()->get($name, $test);
		}
		if ($value === '' || $value === null) {
			$value = $default;
		}
		
		$request->session()->put($name, $value);
		
		return $value;
	}
}

if(!function_exists('active')){

    function active($condition){
        $url = isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "";
        $url = explode('/', $url);

        //Prefixo para a aŕea administrativa
        $prefix = isset($url[1]) ? $url[1] : '';

        //Controller
        $controller = isset($url[2]) ? $url[2] : '';

        //Action
        $action = isset($url[3]) ? $url[3] : '';

        //Url a ser verificada
        $verifyUrl = '';

        if(!empty($prefix))
            $verifyUrl .= $prefix;

        if(!empty($controller))
            $verifyUrl .= '/'.$controller;

        if(!empty($action))
            $verifyUrl .= '/'.$action;

        if(is_string($condition)){
            if(strpos($verifyUrl, $condition) !== FALSE){
                return 'active';
            }
        }else if(is_array($condition)){
            foreach($condition as $key => $value){
                if(strpos($verifyUrl, $value) !== FALSE){
                    return 'active';
                }
            }
        }
        return '';
    }

    /*function active($condition){

		$url = isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "";
		$url = explode('/', $url);
		$root = $url[0];
		$domain = $url[1];
		$action = '';

		if(isset($url[2])){
			if(!empty($url[2])){
				$action = $url[2];
			}
		}

		//$uri = $root.''.$domain.'/'.$action;
		if($condition === $domain && empty($action)){
			return "active";
		}

		$condition = is_array($condition) ? $condition : [$condition];
		$uri = $domain.'/';
		for($i = 2; $i < count($url); $i++){
			$uri .= $url[$i];
			if(in_array($uri, $condition) !== FALSE){
				return "active";
			}
			$uri .= '/';
		}
		/*$t = '';
		foreach($url as $key => $value){
			$t .= $value.'/';
			if(strpos($t, $condition) !== FALSE){
				return "active";
			}
		}
		return "";
	}*/
}

if(!function_exists('string_replace')){
	function string_replace(array $condition, $replace, $str){
		return str_replace($condition, $replace, $str);
	}
}

if (!function_exists('format_with_mask')) {

	/**
	 * Helper to return a Carbon object from a date timestamp
	 * and a custom format
	 *
	 * @param $date
	 * @param $format
	 * @return mixed
	 */
	function format_with_mask($date) {
		if ($date == NULL) {
			return NULL;
		}else{
			return implode('-', array_reverse(explode('/', $date)));
		}
	}

}

if (!function_exists('format_without_mask')) {

	/**
	 * Helper to return a Carbon object from a date timestamp
	 * and a custom format
	 *
	 * @param string $date
	 * @param string $condition
	 * @return mixed
	 */
	function format_without_mask($date, $condition) {
		if ($date == NULL) {
			return NULL;
		}else{
			return implode('-', array_reverse(explode($condition, $date)));
		}
	}

}


if (!function_exists('format')) {

	/**
	 * Helper to return a Carbon object from a date timestamp
	 * and a custom format
	 *
	 * @param $date
	 * @param $format
	 * @return mixed
	 */
	function format($date, $format) {
		if ($date == null)
			return "";
		else
			return Carbon\Carbon::parse($date)->format($format);
	}

}

if(!function_exists('birth_date')){
	function birth_date($date){
		$date = explode('-', $date);
		$date = Carbon\Carbon::create($date[0], $date[1], $date[2]);
		$age = $date->diff(Carbon\Carbon::now())->y;
		//$age = $date->diff(Carbon\Carbon::now())->format('%y Year, %m Months and %d Days');
		return $age;
	}
}

if(!function_exists('age')){
	function age($date){
		if(!is_null($date)){
			$date = explode('-', $date);
			$date = Carbon\Carbon::create($date[0], $date[1], $date[2]);
			$age = $date->diff(Carbon\Carbon::now())->y;
			//$age = $date->diff(Carbon\Carbon::now())->format('%y Year, %m Months and %d Days');
			return $age;
		}
		return NULL;
	}
}

if (!function_exists('format_datebr')) {
	/**
	 * Helper to return a Carbon object from a date timestamp
	 *
	 * @param $date
	 * @return mixed
	 */
	function format_datebr($date) {
		if ($date == null)
			return "";
		else
			return Carbon\Carbon::parse($date)->format('d/m/Y');
	}
}

if (!function_exists('format_datetimebr')) {

	/**
	 * Helper to return a Carbon object from a datetime timestamp
	 *
	 * @param $datetime
	 * @return mixed
	 */
	function format_datetimebr($datetime) {
		if ($datetime == null)
			return "";
		else
			return Carbon\Carbon::parse($datetime)->format('d/m/Y H:i');
	}

}



if (!function_exists('imageurl')) {

	/**
	 * @param $entity
	 * @param $id
	 * @param $photo
	 * @param int $size
	 * @param string $alternate
	 * @return mixed|string
	 * @throws Exception
	 */
	function imageurl($entity, $photo, $size = 0, $square = false) {
		
		if(is_null($photo)){
			return "";
		}
		if ($size === 0) {
			$size = '';
		} else {
			if ($square) {
				$size = '_square' . $size;
			} else {
				$size = '_size' . $size;
			}
		}

		if(!empty($size)){
			$photo = explode(';', $photo);
			foreach($photo as $value){
				if(strpos($value, $size)){
					$photo = $value;
					continue;
				}
			}
		}else{
			$photo = explode(';', $photo)[0];
		}

		$photo = '/uploads/images/' . $entity  . '/' . $photo;

		//O getimagesize funciona melhor que o file_exists nesse caso. O @ � usado para a fun��o retornar false ao inv�s
		//de atirar um erro.
		if(file_exists(public_path().''.$photo)){
			return $photo;
		}
		return "";
	}

}

if (!function_exists('img_sizes')) {

	/**
	 * @param $path
	 * @param $img
	 * @return array
	 */
	function img_sizes($path, $img) {
		if (!preg_match('/\.(gif|jpg|jpeg|tiff|png)$/', $img))
			return NULL;

		list($img_name, $img_extension) = explode('.', $img);

		$dimensions = Config::get('imageupload.dimensions');

		$sources = [];
		$sources['original'] = $path . '/' . $img;
		foreach ($dimensions as $key => $dimension) {
			$sources[$key] = $path . '/' . $img_name . '_' . $key . '.' . $img_extension;
		}

		return $sources;
	}

}

if (!function_exists('supine')) {
	/**
	 * @param $test_id
	 * @return mixed
	 */
	function supine($test_id){
		$supine = \App\Model\Backend\MaximumRepeat::where('test_id', '=', $test_id)
				->where('type_resistance', '=', 1)
				->get()
				->first();
		return $supine;
	}
}

if (!function_exists('actualSupplier')) {
	/**
	 * @param $test_id
	 * @return mixed
	 */
	function actualSupplier($user){
		$suppliers = \App\User::select('suppliers.name AS suppliers_name')
				->where('users.id', '=', $user)
				->where('suppliers_has_users.actual', '=', 1)
				->join('suppliers_has_users', 'suppliers_has_users.user_id', '=', 'users.id')
				->join('suppliers', 'suppliers.id', '=', 'suppliers_has_users.supplier_id')
				->get()
				->first();
		if($suppliers){
			return $suppliers;
		}
		$suppliers = new stdClass();
		$suppliers->suppliers_name = "Não Informado";
		return $suppliers;
	}
}

if(!function_exists('addDaysToDate')){
	function addDaysToDate($date, $days, $format){
		if(!is_null($date)){
			$date = new DateTime($date);
			$date->modify('+'.$days.' day');
			return $date->format($format);
		}
		return NULL;
	}
}

if (!function_exists('findSupine')) {
	/**
	 * @param $test_id
	 * @return mixed
	 */
	function findSupine($id){
		$supine = \App\Model\Backend\MaximumRepeat::where('test_id', '=', $id)
				->where('type_resistance', '=', 1)
				->get()
				->first();
		return $supine;
	}
}

if (!function_exists('findSquat')) {
	/**
	 * @param $test_id
	 * @return mixed
	 */
	function findSquat($id){
		$squat = \App\Model\Backend\MaximumRepeat::where('test_id', '=', $id)
				->where('type_resistance', '=', 2)
				->get()
				->first();
		return $squat;
	}
}

if (!function_exists('squat')) {
	/**
	 * @param $test_id
	 * @return mixed
	 */
	function squat($test_id){
		$squat = \App\Model\Backend\MaximumRepeat::where('test_id', '=', $test_id)
				->where('type_resistance', '=', 2)
				->get()
				->first();
		return $squat;
	}
}

if (!function_exists('currentEvaluation')) {
	/**
	 * @param $user
	 * @return mixed
	 */
	function currentEvaluation($user){
		$current = \App\Model\Backend\Evaluation::where('user_id', '=', $user)
				->orderBy('validity', 'desc')
				->get()
				->first();
		return $current;
	}
}

if (!function_exists('currentTest')) {
	/**
	 * @param $user
	 * @return mixed
	 */
	function currentTest($user){
		$current = \App\Model\Backend\Evaluation::where('user_id', '=', $user)
				->orderBy('validity', 'desc')
				->get()
				->first();
		return $current->test;
	}
}

if (!function_exists('previousTest')) {
	/**
	 * @param $user
	 * @return null
	 */
	function previousTest($user){
		$previus = \App\Model\Backend\Evaluation::where('user_id', '=', $user)
				->orderBy('validity', 'desc')
				->take(2)
				->get();
		return isset($previus[1]) ? $previus[1]->test : null;
	}
}

if (!function_exists('findMaximumRepeat')) {
	/**
	 * @param $id
	 * @return mixed|null|static
	 */
	function findMaximumRepeat($id){
		$maximumRepeat = \App\Model\Backend\MaximumRepeat::find($id);
		return isset($maximumRepeat) ? $maximumRepeat : null;
	}
}
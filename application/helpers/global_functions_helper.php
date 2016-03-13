<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




/*
 * formats a date for display
 */
if(!function_exists('format_date'))
{
    function format_date($date)
    {
        $format = '';
        switch (get_current_user_language())
        {
            case "en-GB":
                $format = 'd/m/Y - h:i A';
                break;
            case "fr-FR";
                $format = 'd/m/Y - H:m';
                break;                
        }
        $phpdate = strtotime( $date );
        $formated_date = date( $format, $phpdate );
        return $formated_date;
    }
}


/*
 * formats a date of birth for display
 */
if(!function_exists('format_date_of_birth'))
{
    function format_date_of_birth($date)
    {
        if($date == null)
            return get_resource(res_Unavailable);
        $phpdate = strtotime( $date );
        $formated_date = date( 'd/m/Y', $phpdate );
        return $formated_date;
    }
}


if(!function_exists('get_all_months'))
{
    function get_all_months()
    {
        return array(
            1 =>  get_resource(res_january),
            2 =>get_resource(res_february),
            3 =>get_resource(res_march),
            4 =>get_resource(res_april),
            5 =>get_resource(res_may),
            6 =>get_resource(res_june),
            7 =>get_resource(res_july),
            8 =>get_resource(res_august),
            9 =>get_resource(res_september),
            10 =>get_resource(res_october),
            11 =>get_resource(res_november),
            12 =>get_resource(res_december),
        );
    }
}


if(!function_exists('current_user'))
{
    function current_user()
    {        
        $user = new User();
        return $user->get_logged_in_user();
    }
}


if(!function_exists('current_user_permissions'))
{
    function current_user_permissions()
    {        
        return current_user()->get_permissions();
    }
}



if(!function_exists('current_user_has_permission'))
{
    function current_user_has_permission($permission_level)
    {
        if(current_user()->is_admin)
        {
            return true;
        }
        return array_key_exists($permission_level, current_user_permissions());
    }
}




if(!function_exists('show_array'))
{
    function show_array($array)
    {
        echo '<pre>';
        echo print_r($array);
        echo '</pre>';
    }
}

    
    if(!function_exists('show_variable'))
    {
        function show_variable($variable)
        {
            var_dump($variable);
        }
    }
    
    
    
if(!function_exists('get_mysql_date_format'))
{
    function get_mysql_date_format($date)
    {
        $date_info = date_parse($date);
        return $date_info['year'] . '-' . 
                $date_info['month'] . '-' . 
                $date_info['day'];
    }
}



if (!function_exists('is_valid_date'))
{
    function is_valid_date($date){
        $date_info = date_parse($date);
        if($date_info['warning_count'] == 0 && $date_info['error_count'] == 0)
        {
            return true;
        }
        return false;
    }
}




if(!function_exists('get_true_false'))
{
    function get_true_false($statement)
    {
        if (strtolower($statement) == 'true')
        {
            return 'true';//get_resource(res_true);
        }
        if (strtolower($statement) == 'false')
        {
            return 'false'; //get_resource(res_false);
        }
    }
}
    

if(!function_exists('get_current_date_mysql_format'))
{
    function get_current_date_mysql_format($time_zone_index = 1)
    { 
        $year = gmdate("Y");
        $month = gmdate("m");
        $day = gmdate("d");
        $hour = gmdate("G") + $time_zone_index;
        $minute = gmdate("i");
        $second = gmdate("s");
        return $year . '-' . 
               $month . '-' . 
               $day . ' ' .
               $hour . ':' . 
               $minute . ':' . 
               $second;
        
    }    
}

if(!function_exists('get_mysql_date_format_from_time_stamp'))
{
    function get_mysql_date_format_from_time_stamp($time_stamp)
    {
        $year = strftime('%Y',$time_stamp);
        $month = strftime('%m', $time_stamp);
        $day = strftime('%d', $time_stamp);
        $hour = strftime('%H', $time_stamp);
        $minute = strftime('%M', $time_stamp);
        $second = strftime('%S', $time_stamp);
        return $year . '-' . 
               $month . '-' . 
               $day . ' ' .
               $hour . ':' . 
               $minute . ':' . 
               $second;
    }
}


if(!function_exists('get_language'))
{
    function get_language($language)
    {
        if(strtoupper($language) == 'ENGLISH')
        {
            return get_resource(res_english);
        }
        if(strtoupper($language) == 'FRENCH')
        {
            return get_resource(res_french);
        }
        
        return '';
    }
}

if(!function_exists('get_languages_array'))
{
    function get_languages_array()
    {
        return array(
            'English' => get_resource(res_english), 
            'French' => get_resource(res_french));
    }
}


if(!function_exists('get_gender'))
{
    function get_gender($gender)
    {
        switch (strtoupper($gender))
        {
            case 'MALE':
                return get_resource(res_male);
                
            case 'FEMALE':
                return get_resource(res_female);
                
            default :
                return '';
        }
    }
}

if(!function_exists('get_CFA_format'))
{
    function get_CFA_format($integer)
    {
        return number_format($integer) . ' CFA';
    }
}

if(!function_exists('get_table_template'))
{
    function get_table_template()
    {
        return array(
                    'table_open'=> '<table class="table table-hover table-bordered table-condensed"'
                );
    }
}

if(!function_exists('get_label_attribute'))
{
    function get_label_attribute()
    {
        return array('class'=> 'col-sm2 control-label');
    }
}


if(!function_exists('get_resource'))
{
    function get_resource($resource_name)
    {
        if(current_user()->user_id)
        {
            return get_resource_with_language($resource_name, current_user()->language);
        }
        
        $language = get_current_user_language();
        
        return get_resource_with_language($resource_name, $language);
    }
}


if(!function_exists('get_current_user_language'))
{
    function get_current_user_language()
    {
        $user = current_user();
        if($user->user_id)
        {
            return current_user()->language;
        }
        
        return $user->get_cookie_language();
    }
}

if(!function_exists('get_system_setting'))
{
    function get_system_setting ($setting_name)
    {
        $setting = new settings();
        
        return $setting->get_setting_value($setting_name);
    }
}


if(!function_exists('get_resource_with_language'))
{
    function get_resource_with_language($resource_name, $language)
    {
        $resource = new resource();
        return $resource->get_resource($resource_name, $language);
    }
}

if(!function_exists('get_male_female_array'))
{
    function get_male_female_array()
    {
        return array(
            'Male'=>get_resource(res_male), 
            'Female'=>get_resource(res_female));
    }
}


<?php
if (! function_exists('CheckBlockedUser')) {
    function checkBlockUser($dateBlock): bool
    {
       if ($dateBlock == null)
           return false;
       else
           return true;
    }
}

if(! function_exists('insertTokenUser')){
    function insertTokenUser($id)
    {
        $dateNow = \Carbon\Carbon::now()->add(2, 'day');
        $data =  \App\Models\User::find($id);
        $token = createToken();
        if($data->token_at == null){
            if(\App\Models\User::where('token',$token)->first()){
                insertTokenUser($id);
            }else{
                \App\Models\User::where('id', $id)->update(['token' => $token , 'token_at' => $dateNow]);
            }
        }else{
            if(checkDate_lte($data->token_at) == false){
                if(\App\Models\User::where('token',$token)->first()) {
                    insertTokenUser($id);
                }else{
                    \App\Models\User::where('id', $id)->update(['token' => $token, 'token_at' => $dateNow]);
                }
            }
        }
    }
}

if(! function_exists('createToken')){
    function createToken($length = 70): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $lengthCharacters = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $lengthCharacters - 1)];
        }
        return $randomString;
    }
}

if(! function_exists('checkDate_lte')){
    function checkDate_lte($date2 , $date1 = null): bool
    {
        if($date1 == null ){
            $date1 =  \Carbon\Carbon::now();
        }
        $date1 = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date1);
        $date2 = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date2);

        return $date1->lte($date2);
    }
}

if(! function_exists('random_code')){
    function random_code($min = 10000 , $max = 99999): int
    {
        return rand($min,$max);
    }
}

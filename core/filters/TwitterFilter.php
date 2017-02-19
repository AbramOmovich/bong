<?php

namespace Core\Filters;


class TwitterFilter
{
    const user_pattern = '/\B(?<active>@(?<login>\w+))/u';
    const replacement = "<a href='https://twitter.com/$2'>$1</a>";

    public static function filterUser($str){

        return preg_replace(self::user_pattern,self::replacement,$str);

    }
}
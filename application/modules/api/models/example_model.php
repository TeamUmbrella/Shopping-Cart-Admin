<?php
Class Example_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_user_by_id($id)
    {
        $users = array(
            1 => array(
                'id' => 1,
                'name' => 'Some Guy',
                'email' => 'example1@example.com',
                'fact' => 'Loves swimming'
            ),
            2 => array(
                'id' => 2,
                'name' => 'Person Face',
                'email' => 'example2@example.com',
                'fact' => 'Has a huge face'
            ),
            3 => array(
                'id' => 3,
                'name' => 'Scotty',
                'email' => 'example3@example.com',
                'fact' => 'Is a Scott!',
                array(
                    'hobbies' => array(
                        'fartings',
                        'bikes'
                    )
                )
            )
        );
        
        return @$users[$id];
    }
    
    function get_users()
    {
        $users = array(
            array(
                'id' => 1,
                'name' => 'Some Guy',
                'email' => 'example1@example.com'
            ),
            array(
                'id' => 2,
                'name' => 'Person Face',
                'email' => 'example2@example.com'
            ),
            3 => array(
                'id' => 3,
                'name' => 'Scotty',
                'email' => 'example3@example.com',
                'fact' => array(
                    'hobbies' => array(
                        'fartings',
                        'bikes'
                    )
                )
            )
        );
        
        return $users;
    }
    
}
?>

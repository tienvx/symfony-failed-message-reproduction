# Symfony Failed Message Reproduction

This project show how `error` missing from failed message.

Before retry:
```
There is 1 message pending in the failure transport.
 ---- --------------------------- --------------------- --------------------------- 
  Id   Class                       Failed at             Error                      
 ---- --------------------------- --------------------- --------------------------- 
  5    App\Message\FailedMessage   2019-09-16 16:50:58   Something wrong happened!  
 ---- --------------------------- --------------------- --------------------------- 

 // Run messenger:failed:show {id} -vv to see message details.
```

After retry:
```
There is 1 message pending in the failure transport.
 ---- --------------------------- --------------------- ------- 
  Id   Class                       Failed at             Error  
 ---- --------------------------- --------------------- ------- 
  6    App\Message\FailedMessage   2019-09-16 17:38:34          
 ---- --------------------------- --------------------- ------- 

 // Run messenger:failed:show {id} -vv to see message details.
```

# Install
```
$ composer install
```

# Test
```
$ bin/console messenger:consume async
$
$ # Open another terminal
$ bin/console app:send-message
$ # Wait for a moment, then:
$ bin/console messenger:failed:show
$ bin/console messenger:failed:retry 5
$ # Wait for a moment, then:
$ bin/console messenger:failed:show
```

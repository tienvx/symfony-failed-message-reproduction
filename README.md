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

Details:
```
There is 1 message pending in the failure transport.

Failed Message Details
======================

 ------------- --------------------------- 
  Class         App\Message\FailedMessage  
  Message Id    6                          
  Failed at     2019-09-16 23:54:40        
  Error                                    
  Error Class   (unknown)                  
  Transport     async                      
 ------------- --------------------------- 

 Message history:
  * Message failed and redelivered to the async transport at 2019-09-16 23:53:46
  * Message failed and redelivered to the async transport at 2019-09-16 23:53:47
  * Message failed and redelivered to the async transport at 2019-09-16 23:53:49
  * Message failed and redelivered to the failed transport at 2019-09-16 23:53:53
  * Message failed and redelivered to the failed transport at 2019-09-16 23:54:40

 Re-run command with -vv to see more message & error details.

 Run messenger:failed:retry 6 to retry this message.
 Run messenger:failed:remove 6 to delete it.
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
$ bin/console messenger:failed:retry 5 # answer: yes
$ # Wait for a moment, then:
$ bin/console messenger:failed:show
$ bin/console messenger:failed:show 6
```

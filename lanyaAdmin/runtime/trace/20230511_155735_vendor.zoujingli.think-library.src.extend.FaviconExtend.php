[CODE] 0
[INFO] Read picture file Failed.
[FILE] think\admin\Exception in vendor/zoujingli/think-library/src/extend/FaviconExtend.php line 73
[TIME] 2023-05-11 15:57:35

[TRACE]
#0 /www/wwwroot/yj.shningmi.com/vendor/zoujingli/think-library/src/extend/FaviconExtend.php(59): think\admin\extend\FaviconExtend->addImage()
#1 /www/wwwroot/yj.shningmi.com/app/admin/controller/Config.php(97): think\admin\extend\FaviconExtend->__construct()
#2 [internal function]: app\admin\controller\Config->system()
#3 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Container.php(344): ReflectionMethod->invokeArgs()
#4 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/route/dispatch/Controller.php(110): think\Container->invokeReflectMethod()
#5 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(59): think\route\dispatch\Controller->think\route\dispatch\{closure}()
#6 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(66): think\Pipeline->think\{closure}()
#7 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/route/dispatch/Controller.php(113): think\Pipeline->then()
#8 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/route/Dispatch.php(90): think\route\dispatch\Controller->exec()
#9 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Route.php(772): think\route\Dispatch->run()
#10 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(59): think\Route->think\{closure}()
#11 /www/wwwroot/yj.shningmi.com/vendor/zoujingli/think-library/src/Library.php(122): think\Pipeline->think\{closure}()
#12 [internal function]: think\admin\Library->think\admin\{closure}()
#13 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Middleware.php(142): call_user_func()
#14 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(85): think\Middleware->think\{closure}()
#15 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(66): think\Pipeline->think\{closure}()
#16 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Route.php(773): think\Pipeline->then()
#17 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Http.php(216): think\Route->dispatch()
#18 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Http.php(206): think\Http->dispatchToRoute()
#19 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(59): think\Http->think\{closure}()
#20 /www/wwwroot/yj.shningmi.com/vendor/zoujingli/think-library/src/multiple/Multiple.php(72): think\Pipeline->think\{closure}()
#21 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(59): think\admin\multiple\Multiple->think\admin\multiple\{closure}()
#22 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(66): think\Pipeline->think\{closure}()
#23 /www/wwwroot/yj.shningmi.com/vendor/zoujingli/think-library/src/multiple/Multiple.php(73): think\Pipeline->then()
#24 [internal function]: think\admin\multiple\Multiple->handle()
#25 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Middleware.php(142): call_user_func()
#26 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(85): think\Middleware->think\{closure}()
#27 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/middleware/LoadLangPack.php(57): think\Pipeline->think\{closure}()
#28 [internal function]: think\middleware\LoadLangPack->handle()
#29 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Middleware.php(142): call_user_func()
#30 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(85): think\Middleware->think\{closure}()
#31 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/middleware/SessionInit.php(67): think\Pipeline->think\{closure}()
#32 [internal function]: think\middleware\SessionInit->handle()
#33 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Middleware.php(142): call_user_func()
#34 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(85): think\Middleware->think\{closure}()
#35 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Pipeline.php(66): think\Pipeline->think\{closure}()
#36 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Http.php(207): think\Pipeline->then()
#37 /www/wwwroot/yj.shningmi.com/vendor/topthink/framework/src/think/Http.php(170): think\Http->runWithRequest()
#38 /www/wwwroot/yj.shningmi.com/vendor/zoujingli/think-library/src/service/SystemService.php(394): think\Http->run()
#39 /www/wwwroot/yj.shningmi.com/public/index.php(25): think\admin\service\SystemService->doInit()
#40 {main}
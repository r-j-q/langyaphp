<?php











namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => '6.x-dev',
    'version' => '6.9999999.9999999.9999999-dev',
    'aliases' => 
    array (
    ),
    'reference' => '958d357a035a2b2c68dc814f83e0409dc221d35c',
    'name' => 'zoujingli/thinkadmin',
  ),
  'versions' => 
  array (
    'endroid/qr-code' => 
    array (
      'pretty_version' => '1.9.3',
      'version' => '1.9.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c9644bec2a9cc9318e98d1437de3c628dcd1ef93',
    ),
    'league/flysystem' => 
    array (
      'pretty_version' => '1.1.9',
      'version' => '1.1.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '094defdb4a7001845300334e7c1ee2335925ef99',
    ),
    'league/flysystem-cached-adapter' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd1925efb2207ac4be3ad0c40b8277175f99ffaff',
    ),
    'league/mime-type-detection' => 
    array (
      'pretty_version' => '1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'aa70e813a6ad3d1558fc927863d47309b4c23e69',
    ),
    'psr/cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd11b50ad223250cf17b86e38383413f5a6764bf8',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8622567409010282b7aeebe4bb841fe98b58dcaf',
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
    ),
    'symfony/options-resolver' => 
    array (
      'pretty_version' => 'v3.4.47',
      'version' => '3.4.47.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c7efc97a47b2ebaabc19d5b6c6b50f5c37c92744',
    ),
    'topthink/framework' => 
    array (
      'pretty_version' => 'v6.0.12',
      'version' => '6.0.12.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e478316ac843c1a884a3b3a7a94db17c4001ff5c',
    ),
    'topthink/think-helper' => 
    array (
      'pretty_version' => 'v3.1.6',
      'version' => '3.1.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '769acbe50a4274327162f9c68ec2e89a38eb2aff',
    ),
    'topthink/think-orm' => 
    array (
      'pretty_version' => 'v2.0.52',
      'version' => '2.0.52.0',
      'aliases' => 
      array (
      ),
      'reference' => '407a60658f37fc57422ab95a9922c6f69af90f46',
    ),
    'topthink/think-template' => 
    array (
      'pretty_version' => 'v2.0.8',
      'version' => '2.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => 'abfc293f74f9ef5127b5c416310a01fe42e59368',
    ),
    'topthink/think-view' => 
    array (
      'pretty_version' => 'v1.0.14',
      'version' => '1.0.14.0',
      'aliases' => 
      array (
      ),
      'reference' => 'edce0ae2c9551ab65f9e94a222604b0dead3576d',
    ),
    'zoujingli/ip2region' => 
    array (
      'pretty_version' => 'v1.0.11',
      'version' => '1.0.11.0',
      'aliases' => 
      array (
      ),
      'reference' => '53023ae18c8abc110a6019819a526c0a7b225ded',
    ),
    'zoujingli/think-library' => 
    array (
      'pretty_version' => 'v6.0.27',
      'version' => '6.0.27.0',
      'aliases' => 
      array (
      ),
      'reference' => '425a94257350161e93d47bbb85b123bdbc5f5951',
    ),
    'zoujingli/thinkadmin' => 
    array (
      'pretty_version' => '6.x-dev',
      'version' => '6.9999999.9999999.9999999-dev',
      'aliases' => 
      array (
      ),
      'reference' => '958d357a035a2b2c68dc814f83e0409dc221d35c',
    ),
    'zoujingli/wechat-developer' => 
    array (
      'pretty_version' => 'v1.2.34',
      'version' => '1.2.34.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f61067ce5a35409f61c679272b9931095ee73df2',
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}

<?php
/**
 * 项目配置
 *
 * 建议将default项目放在最后面
 *
 * @var array
 */
$config['projects'] = array
(
    // 请在这边加入其它项目，参照default
    /*
    'admin' => array
    (
        'name'      => '独立后台',
        'dir'       => 'admin',
        'isuse'     => true,
        'url'       => '/admin/',
        'url_admin' => '/',
    ),
    */

    // 请确保Default放在最后
    'default' => array
    (
        'name'      => '默认项目',        //名称
        'dir'       => 'default',        //目录
        'isuse'     => true,             //是否启用
        'url'       => '/',              //URL根目录，可以是字符串也可以是数组，可以/开头，也可以http://开头。
        'url_admin' => '/admin/',        //后台URL根目录，同上
        'url_rest'  => '/api/',          //RESTFul接口起始URI，同上
        /*
        // 此项目有的加载类库配置
        'libraries' => array
        (
            'autoload' => array(),
            'cli'      => array(),
            'debug'    => array(),
            'admin'    => array(),
            'rest'     => array(),
        ),
        */
    ),
);


/**
 * 加载库配置
 *
 * @var array
 */
$config['libraries'] = array
(
    // 默认会自动加载的类库
    'autoload' => array
    (

    ),

    // 命令行下会加载的类库
    'cli'      => array
    (

    ),

    // RESTFul模式时会加载的类库
    'rest'     => array
    (

    ),

    // 调试环境下会加载的类库
    'debug'    => array
    (
        'com.myqee.develop',
    ),

    // 后台模式时会加载的类库
    'admin'    => array
    (
        'com.myqee.administration',
    ),
);


/**
 * 静态资源的URL，可以是http://开头，例如 http://assets.test.com/
 *
 * 对应于wwwroot目录下的assets目录，建议绑定二级域名
 *
 * @var string
 */
$config['url']['assets'] = '/assets/';

/**
 * 实时配置文件
 *
 * 服务器通常设置为 server，本地开发可设置为 dev1, dev_jonwang 等等。只允许a-z0-9_字符串，留空则禁用
 *
 * 用途说明：
 * 在团队成员开发时，个人的配置和服务器配置可能会有所不同，所以每个人希望有一个自己独有的配置文件可覆盖默认配置，通过runtime_config设置可轻松读取不同的配置
 * 比如，在服务器上设置 `$config['runtime_config'] = 'server';` 在本地开发时设置 `$config['runtime_config'] = 'dev';`
 * 那么，服务器上除了会读取 `config.php` 还会再读取 `config.server.runtime.php` 的配置文件，而在开发环境上则读取 `config.dev.runtime.php` 配置文件
 *
 * !!! 只会读取根目录、团队类库和项目中的 .runtime.php，不支持类库(含Core)中 .runtime.php
 * !!! V2中 `$config['debug_config'] = false;` 参数已废弃，可用次参数设为debug实现类似功能
 *
 * @var string
 */
$config['runtime_config'] = '';


/**
 * 用于 http://your_domain/opendebugger 页面开启在线debug功能
 *
 * key为用户名，value为密码的md5值，支持多个，留空则关闭此功能
 *
 * !!! 密码为md5后的值，并非密码明文
 *
 * @example $config['debug_open_password'] = array('user1'=>'6e6fdf956d04289354dcf1619e28fe77', 'user2'=>'6e54dcf166fdf956d04289319e28fe77');
 * @var array
 */
$config['debug_open_password'] = array
(
    //'myqee' => 'e10adc6e057f20f8833949ba59abbe5e',
);


/**
 * 默认打开开发调试环境的关键字，推荐在本地开发时开启此功能
 *
 * !!! 开发时使用Firefox+FireBug将可查看程序执行的各项debug数据，方便开发。但注意：生产环境中不要开启
 *
 * 如果值为 `myqee.debug` 则可在php.ini中加入：
 *
 *     [MyQEE]
 *     myqee.debug = On
 *
 * 如果值为 `test.abc` 则可在php.ini中加入：
 *
 *     [MyQEE]
 *     test.abc = On
 *
 * @var string
 */
$config['local_debug_cfg'] = 'myqee.debug';


/**
 * 页面编码
 *
 * @var string
 */
$config['charset'] = 'utf-8';


/**
 * 网站根目录
 *
 * 设为null则自动判断
 *
 * @var string
 */
$config['base_url'] = null;


/**
 * Data文件、Log、文件缓存等文件写入模式
 *
 * 参数                        | 描述
 * ---------------------------|--------------------------------------------------------------------
 * normal                     | 正常的文件写入，请确保相应目录有写入权限
 * disable                    | 禁用所有写入并丢弃内容，可用于SAE,BAE等程序目录不允许写入的安全级别高的环境，安全级别高
 * db://for_file/filetable    | 用于目录不能写入内容又不希望丢弃数据的情况，系统自动转为写入数据库，将会写入 `$db = new Database('for_file');` 表名称 `filetable` 中
 * cache://for_file/prefix_   | 同上，将会使用缓存对象写入 `$cache = new Cache('for_file');` 缓存前缀为 `prefix_`
 *
 * @string
 */
$config['file_write_mode'] = 'normal';


/**
 * 500错误页面相关设置
 *
 * @var array
 */
$config['error500'] = array
(
    /**
     * 关闭错误页面记录错误数据功能
     *
     * true - 关闭.关闭后所有的500错误页面只在页面上输出简单错误数据，错误信息不记录在服务器上
     *
     * @boolean
     */
    'close' => false,

    /**
     * 错误页面数据记录方式
     *
     * 参数      | 描述
     * ---------|-----
     * file     | 文件(默认方式)
     * database | 数据库
     * cache    | 缓存保存
     *
     * @string
     */
    'save_type' => 'file',

    /**
     * 错误页面数据记录方式对应配置
     *
     * 例如save_type为database，则此参数为数据库的配置名
     * 如果save_type为cache，则此参数为驱动的配置名
     *
     * @string
     */
    'type_config' => 'default',
);

/**
 * 错误等级
 *
 * @var int
 */
$config['error_reporting'] = 7;


/**
 * 服务器默认文件夹文件
 *
 * @example index.htm, default.html
 * @var string
 */
$config['server_index_page'] = 'index.html';


/**
 * 默认控制器
 *
 * @var string
 */
$config['default_controller'] = 'index';


/**
 * 默认控制器方法
 *
 * @var string
 */
$config['default_action'] = 'default';


/**
 * 默认时区
 *
 * @var string
 * @see http://www.php.net/manual/en/timezones.php
 */
$config['timezone'] = 'PRC';


/**
 * 默认语言包
 *
 * @var string
 */
$config['lang'] = 'zh-cn';


/**
 * HTTPS是否开启的关键字，通常不用改
 *
 * @var string
 */
$config['server_https_on_key'] = 'HTTPS';


/**
 * 记录慢查询的时间，单位毫秒。0表示不记录
 *
 * 在shell下执行SQL不记录
 * 慢查询将都记录在 Log目录的slow_query目录下，按年月分目录记录。类似：
 *
 *    GET  22:46:33 -   9037 - 127.0.0.1       http://www.test.com/abc/?a=1
 *         22:46:33 -   3003 - SELECT * FROM `admin_member` WHERE `id` = '1'
 *         22:46:36 -   3000 - SELECT * FROM `test` WHERE `id` = '1'
 *
 *  表示：
 *    11点13分50秒GET请求的http://www.test.com/abc/?a=1页面产生的SQL
 *    执行时的时间    耗时(单位毫秒)   查询语句
 *
 * @var int
 */
$config['slow_query_mtime'] = 2000;


/**
 * assets允许的文件后缀名，用|隔开
 *
 * @var string
 */
$config['asset_allow_suffix'] = 'js|css|jpg|jpeg|png|gif|bmp|pdf|html|htm|mp4|swf';


/**
 * HTML5自动跨越请求支持
 *
 * 开启后，如果遇到AJAX跨越请求，则会自动加上 Access-Control-Allow-Origin 的支持
 * 注意，只有支持HTML5的此协议的浏览器有用，IE6,7等浏览器不支持这个
 *
 *      header("Access-Control-Allow-Origin: http://.../');
 *
 * none - 不自动处理
 * auto - 自动（可自动允许相同主域名下的所有的请求）
 * 也可设置一个数组，指定允许的域名，支持通配符*。例如：
 *
 *      $config['ajax_cross_domain'] = array
 *      (
 *          '*.myqee.com',
 *          '*.myqee.sinaapp.com',
 *          'www.queyang.com',
 *      );
 *
 * @var auto | array
 */
$config['ajax_cross_domain'] = 'auto';


/**
 * 是否隐藏 X-Powered-By 头部版本输出
 *
 * true   - 隐藏
 * false  - 显示
 * string - 自定义输出的头信息
 *
 * @var boolean | string
 */
$config['hide_x_powered_by_header'] = false;







//---------------------------------------------------------- CSRF 相关

/**
 * POST请求模式下自动检查引用页，如果是同主域名下的请求，将被通过，否则返回406错误
 *
 * 开启后将屏蔽所有非本域下URL的POST请求，建议开启，可有效避免 CSRF 攻击
 *
 * 自行检查的方法: `HttpIO::csrf_check()`, 若返回 `true` 则表示检查通过
 *
 * 若需要某个控制器关闭自动检查，在控制器里设置变量 `public $auto_check_post_method_referer = false` 即可，反之亦然，例如：
 *
 *      class Controller_Test extends Controller
 *      {
 *          // 设置不自动验证
 *          public $auto_check_post_method_referer = false;
 *
 *          public function action_default()
 *          {
 *              echo 'hi';
 *          }
 *      }
 *
 * @see http://baike.baidu.com/view/1609487.htm
 * @see http://www.nxadmin.com/web/924.html
 * @return boolean
 */
$config['auto_check_post_method_referer'] = true;


/**
 * 在表单使用token时创建校验数据存放在服务器缓存中的时间，单位秒
 *
 * 设置成0表示禁用缓存保存校验数据，此时数据将随表单一起输出，为了提高安全请设置 `$config['form_token_hash_key']` 值
 * 设置成0将不会对服务器造成缓存数据压力，但相对于把验证数据存在服务器安全性会差些，此时所以的校验将依赖 `$config['form_token_hash_key']`，并且存在在有效期内被重复利用的可能
 *
 * @var string
 */
$config['form_token_cache_time'] = 86400;


/**
 * 表单使用token时存放随机key的缓存配置名，默认null即 `Cache::DEFAULT_CONFIG_NAME` 的值
 *
 * 在 `Form::open('uri', array(), true)` 和 `Form::check_token()` 时使用到
 *
 * @var string
 */
$config['form_token_cache_name'] = null;


/**
 * 在表单使用token时创建hash值时用到的key
 *
 * @var string
 */
$config['form_token_hash_key'] = '';









// ----------------------------------------------------------- 服务器同步

/**
 * 文件保存同步模式
 *
 * 可选参数 default|rsync|none
 *
 * 参数     | 说明
 * --------|---------------------------------
 * default | 全部轮询同步
 * rsync   | 到主服务器上执行操作，然后由系统rsync进行同步更新
 * none    | 表示不同步操作
 *
 * @var string
 */
$config['file_sync_mode'] = 'default';


/**
 * 系统内部调用接口密钥，留空则系统会使用全部core配置和database序列化拼接后md5产生
 *
 * @var string
 */
$config['system_exec_key'] = '';


/**
 * WEB服务的服务器列表，留空则禁用同步功能（比如只有1台web服务器时请禁用此功能）
 *
 * 配置服务器后，可以实现服务器上data目录的文件同步功能，同步逻辑通过本系统完成，如果已经配置了data目录的sync同步机制，只需要配置1个主服务器即可
 * 并且系统 `File` 类库的所有文件操作也会根据设置进行同步保存
 * 可通过 HttpCall::sync_exec('test/abc','arg1','arg2','arg3'); 实现在所有服务器上各自运行一遍
 *
 *     //可以是内网IP，确保服务器之间可以相互访问到，端口请确保指定到apache/IIS/nginx等端口上
 *     array
 *     (
 *         '192.168.1.1',        //80端口可省略:80
 *         '192.168.1.2:81',
 *         '192.168.1.3:81',
 *     )
 *
 * @var array
 */
$config['web_server_list'] = array
(
    'default' => array
    (

    )
);



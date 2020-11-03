<?php
header("content-type:text/html;charset=utf-8");
//mysql
$link=mysqli_connect("localhost","root","","");    // 连接数据库
$link->query("set names utf8");    // 设置字符集

include_once "db.php";  //引入外部文件
require_once "db.php";    // 引入外部文件

//create database 库名 charset utf8;       创建数据库
//create table 表名(id int primary key auto_increment,);    创表加设置id为主键自增
//drop table 表名;   删除表

//insert into 表名 values();     新增
//delete from 表名 where 条件;   删除   in  内          truncate 表名  =>   相当于 先 drop表 再 create自己
//update 表名 set 字段=新值;     修改
//select * from 表名;      查询     like  模糊查询    limit   条件限制   order by id desc;   select count(1) as count from 表名;   取数量加取别名

//完整的查询数据语法：     select [关键字]选项 from 数据源 [where条件 group by分组 having条件 order by排序 limit限制];

// 聚合函数	sum()求和	count()计数    avg()求平均值	   max()求最大值      min()求最小值
// group_concat() 将分组制定字段合并

// 联合查询  union [选项]  			[选项] distinct:去重[默认] / all:显示所有

// 连接查询   内连接【inner join   on】         外连接【左外联 left join   on      右外联right join    on】
//            自然连接【natural join】          交叉连接 【cross join】       

// 子查询    where子查询: select * from 表 where 字段 in (子查询)                from子查询: select * from (子查询) as 别名

// SELECT * FROM zhuce ORDER BY RAND() LIMIT 6            随机分配查出来的数据


// 两种查出有几条数据的方法
// $seleSql="select count(1) as count from xuq";
//	$result=$link->query($seleSql);                     
//	while($row=mysqli_fetch_assoc($result)){              
//             $resultDatas[]=$row;
//		}
//	 $resultDatas=$resultDatas['0']['count'];      所有数据

//或
//  $seleSql="select * from xuq";
//	$result=$link->query($seleSql);      
//  $count=mysqli_num_rows($result2);	          所有数据


//php
// enctype="multipart/form-data"    上传图片协议
//$res=move_uploaded_file($_FILES['img']['tmp_name'],'images/'.$_FILES['img']['name']);   // 图片地址跟文件名   $_FILES函数是接收上传文件

// join($id,",");   implode($id,',');      数组转字符串

//$REQUEST 接收get跟post
//if($_SERVER['REQUEST_METHOD']=='POST'){}  // 判断是什么类型提交
//mysqli_num_rows()     // 返回一个数量    或   $duix->num_rows;


//time(); 时间  date("Y-m-d H:i:s",);   // 把时间格式化
//strtotime("-1 month");   前一个月时间
//rand(0,999999);   // 随机数

//preg_match(,);  //PHP判断正则表达式调用
// s=/[a-z]/.test(1234125)   js判断正则表达式调用

//setcookie('username','zhangsan'); // 存cookie
//$_COOKIE;      // 取kookie
//session_start();           // 打开session 回话数据管理
// $_SESSION['username']=$username;  session 赋值
//session_destroy(); $_SESSION;     //销毁 会话数据空间
//unset();              //销毁变量


// 对象 
// 声明一个类 
//class 类名{
//	public 成员属性
//	public function 方法名(){
//		
//	}
//}

// 实例化一个类 new 类名    $obj=new 类名();
// 调用类下面的属性   对象->属性名     $obj->name;
// 调用类下面的方法   对象->方法名();
//$this(); "伪对象" ，在当前的类下表示自己这个对象。

// __construct()   构造函数       对象初始化的时候会被调用
//  __destruct()   析构函数       执行 unset() ,或 变量重新赋值时， 或 结束时 会自动调用
// clone  复制函数     __clone()   只有使用到复制表才会被自动调用
// __autoload()     自动加载 实例化的时候自动调用
//spl_autoload_register('test');   注册函数
//在类里面用 spl_autoload_register(array('类名','方法名'));  
//用 spl_autoload_register(array($this,'test'));
//或用静态方法 spl_autoload_register(array('类名','方法名'));  或用静态方法 spl_autoload_register('类名::方法名'); 


 //function __autoload($class_name){
    // if(file_exists('./'.$class_name.'.class.php')){
	//	include './'.$class_name.'.class.php';
	//}else{
	//	die("文件不存在");
	//}
 //}   

// 静态属性
// public static $name;              定义静态属性      self::$属性名; 或 类名::$属性名字;  
//在类里面使用静态方法可以用"类名"或"self"   在外面要用类名    静态变量要带$符号 

// public static function 方法名(){}       定义静态方法      self::$方法名;  或  类名::$属性名;
//在类里面使用静态方法可以用"类名"或"self"   在外面要用类名      静态方法里无法调用普通成员  
// self代表该类，$this代表该对象。

// const 常量名=常量值;     定义常量    self::常量名;   self::常量名;  或  类名::常量名;
//在类里面使用静态方法可以用"类名"或"self"   在外面要用类名    静态常量名不要带$符号
// 继承的方法：使用extends关键字      class 子类 extends 父类{}
//parent::   使用parent::来引用父类的方法，同时也可以用于调用父类中定义的成员方法。

// 访问控制修饰符
// public    公共的 公开的
//protected    受保护的
//private	   私有的

//final类：也叫做最终类，不能被继承，只能被实例化
//abstract类：也叫抽象类，只能被继承，不能被实例化

// 接口 interface (只能写抽象方法和常量)   只能被继承，不能被实例化。
//只能被类继承调用 (implements 等同于 extends) 不能接口继承接口

//overload重载

// 给不可以访问的属性直接赋值，系统就会调用__set 魔术方法
// 当我们去使用不可以访问的属性时，系统就会调用__get 魔术方法
//__unset() 销毁某一个对象的 不可访问属性/不存在的属性时 触发	 (可以在类里面调用unset()，同样触发)
///__isset() 判断某一个对象的 不可访问属性/不存在的属性时 触发	(在类里面调用isset()/empty()，不触发)
//__call()： 只能是用非静态方法调用才触发
//__callstatic()：只能是用静态方法调用才触发

//47.对象的序列化(对象的数据保存)
//写：file_put_contents(文件路径,数据)   返回值：是存储数据的字符串长度
//读：file_get_contents(文件路径)


jquery

/* id  $('#')  class  $('.')  标签  $('标签')
  对象.text()  对象.html()  对象.val()
  对象.click() 对象.change() 对象.submit()
  
	
	  $.ajax({
	    url:'提交地址',
		type:'提交方法',
		async:false,    // async：true（异步）或 false（同步）
		dataType:'json',     //表示返回是json格式
		data:'提交数据(对象)',
		success:function(data){   success:执行ajax成功时执行的内容
			 console.log(data);		  
		}
	});
  });
*/
/*
    $(document).ready(function () {
        //调用函数，初始化表格
        initTable();
        //当点击查询按钮的时候执行
        $("#search").bind("click", initTable);
    });      自动调用
*/

/*
			onLoadSuccess: function () {  //加载成功时执行
                layer.msg("加载成功", {time: 1000});
            },
            onLoadError: function () {  //加载失败时执行
                layer.msg("加载数据失败");
            }
*/

//$('#send').click(function () {});
 
 //layer.msg('删除成功', {icon: 1, time: 1000}, function () {});
 
 // $.post('./forbidden', {'id': id}, function (data) {});
 // $.getJSON('./index', {'type': 'get', 'id': 1}, function (res) {});
 
 
 



thinkphp
//namespace app\admin\Controller;	命名空间
//use app\admin\Controller\Base;	引用文件
//use think\Controller;		
//use think\Session;

//$this->assign('res',$name);  // 赋值 
//return $this->fetch();  // 渲染 显示对应的html文件
//{include file='zycx/aa'}    引入页面内容

//$this->redirect(url('login/text2'));		重定向重新指向新的url
//$this->success('登录成功', 'denlu/demo2');	登录成功后跳转
//$this->error('密码不正确');					登录失败

// _initialize	执行方法时会自动调用
// mvc  C控制器 V视图 C模型		路由 index.php/admin/index 控制器/index 方法	
// {:url('admin/denlu/login')} 	html跳转里面的格式	括号里面是路由地址
// {foreach name='ress' item='ov'} 	html循环里面的格式
//{if condition="$id eq 1"}{else /}{/if}	html页面if方法
//{notempty name='id'}{/notempty}     判断是否有值
//{if !empty($menu)}{/if}       判断是否有值

//  session_start(); 开启session 	session('name'); 获取  session('name',null); 删除
// Session::set('name','thinkphp'); 存session    Session::get('name'); 取session     Session::delete('name'); 删除session

// 增删改查
// return Db::name('user')->select(false);     终止查询，在执行sql之前输出原生执行sql，不查询。
// return Db::name('user')->fetchSql(true)->select();    直接显示该链接查询的原生sql

// return Db::name('user')->select();   查询所有数据
// return Db::name('user')->find();     查询一条数据

// $data = ['name' => 'admin', 'pwd' => 123];
// return Db::name('user')->insert($data);   插入单条数据
// return Db::name('user')->insertAll($data);       插入多条数据
// return Db::name('user')->insertGetId($data);  添加数据返回当前插入数据的主键id

//return Db::name('user')->where('id', 1)->update(['name' => 'he']);	修改

//return Db::name('user')->where('id', 1)->setInc('name', 1);	自增 表示name+1
//return Db::name('user')->where('id', 1)->setDec('name', 1);	自减 表示name-1

//return DB::name('user')->where('id', '=', '6')->delete();	删除

//where
/*
$where=[
	'id'=>['eq','1']
];	where条件 数组形式
*/

// Db::name 会自动调用匹配表前缀  Db::table  不会自动匹配表前缀
// alias 别名  ->alias('a')  或 ->alias(['think_user'=>'user','think_dept'=>'dept'])
//find 查询一条数据    field 指定字段查询
// ->order('id desc')->limit(5)   倒叙 只查询五条
// ->paginate(10);  查询10条数据分页    {$res->render()} 前端页面显示分页

// input();  tp5 的一个方法可以接受所有传过来的值
// data: {'data': $('#commentForm').serialize()},   ajax 直接获取from 的所有值
//  $param = parseParams(input("param.data"));    吧ajax 直接获取from 转数组
//  return json(['code' => -1, 'msg' => '添加失败', 'data' => '']);   返回json的格式
//   if (request()->isAjax()){}      判断是否是ajax提交过来

// 	if (!captcha_check($yzm)){return json(['code'=>-1,'msg'=>'验证码错误','data'=>'']);}  判断验证码
//<span class="admin-captcha"><img src="{:captcha_src()}" class="verify" onclick="javascript:this.src='{:captcha_src()}?rand='+Math.random()"  width="90" height="35"></span>  验证码

// 加密严值
//'encryption' =>'aldsi!@#$%^&_ads88',
// md5($password.config('encryption'))


redis
// mysql 默认端口 3306
// apache  默认端口 80
// redis  默认端口 6379
// mongodb 默认端口 27017

//字符串(string)、哈希(hash)、链表(list)、有序集合(zset)、无序集合(set)

// 有序集合(zset)
// zadd(添加) 【zadd 集合名称 序号 值】->【zadd set1 10 libai】
// zrange(取出正序) 【zrange 集合名称 开始下标 结束下标】->【zrange set1 0 3】表示取出下标从0开始到下标为3结束；如果开始下标为0，结束下标为-1，表示显示该集合所有的值。
// zrevrange(取出倒序) 原理和正序一样

// 无序集合(set)[值唯一性,无序性]
// sadd(添加) 【sadd 集合名称 值】->【sadd set2 zhangshun】
// smembers(取出) 【smembers 集合名称】
// sdiff(求差集) 	【sdiff 集合1 集合2】->【sdiff set1 set2】:拿集合1和集合2比较，问集合1和集合2有哪些不同的值。
// sinter(求交集) 【sinter 集合1 集合2】->【sinter set1 set2】
// sunion(求并集) 【sunion 集合1 集合2】->【sunion set1 set2】:合并连个集合所有的值，相同的值会去重。
// scard(求个数) 【scard 集合名称】

//列表(list)：是一个双向的列表，通过push和pop操作从列表的头或者尾部添加或删除
//lpush(添加一条数据到栈的尾部，数组的头部) 【lpush 列表名(键名) 值】->【lpush 8list1 a】
//lrange(取出列表的值) 【lrange 列表名(键名) 开始下标 结束下标】->【lrange 8list1 0 -1】	
//rpush(添加一条数据到队列的头部，数组的尾部) 【rpush列表名(键名) 值】->【rpush 8list2 a】	
//ltrim(保留范围元素) 	【ltrim列表名(键名) 开始下标 结束下标】->【ltrim 8list1 0 5】:保留8list1列表中下标从0到5的值，范围外的会被删除
//lpop(从头部删除一个值,返回的是被删除的值)	【lpop列表名(键名)】->【lpop 8list1】
//rpop(从尾部删除一个值,返回的是被删除的值)	【rpop列表名(键名)】->【lpop 8list1】


// 哈希(hash):可以用来存储mysql中的一条数据，类似关联数组
//hset(设置哈希键里的字段和值)【hset  hash键名 字段 值】->【hset  8user:id:1 id 1】
//hget(获取哈希键下的值)【hget  hash键名 字段】->【hget  8user:id:1  id】
//hmset(设置哈希键下多个字段的值)【hmset  hash键名 字段1 值1字段2 值2...】->【hmset  8user:id:2  id  2  name  b  age  12  email  b@qq.com】
//hmget(获取哈希键里的多个字段和多个值)【hmget  hash键名 字段1 字段2...】 ->【hmset  8user:id:2  id   name  age  email】

//字符串(string)
//set(添加字符串)【set 键名 值】->【set 8username litao】
//get(获取字符串)【get 键名】->【get 8username】
//incr(自增+1，只能对纯数字的键名操作，返回自增之后的结果)【incr 键名】->【incr 8age】
//incrby(针对键名增加具体的值，返回值是自增之后的结果)【incrby 键名 具体值】->【incr  8age  50】
//del 删除key     //decr  递减-1


//$redis->ttl(set)   以秒为单位，返回给定 key 的剩余生存时间
//$redis->expire(set,10)   为给定 key 设置生存时间，当 key 过期时(生存时间为 0 )，它会被自动删除。

//redis 基础命令
//keys *：查询当前数据库的所有key，可以keys a*这样使用
//exists 键：判断键是否存在，存在返回1，不存在返回0
//del 键：删除该键
//expire 键 生命周期(s)：给键设置生命周期，单位是秒
//ttl 键：查询键的剩余生存周期，单位是秒，键不存在返回-2，未设置生命周期返回-1
//type 键：返回键的数据类型
//select 数据库序号：选择相应的数据库
//dbsize：返回当前数据库的key个数
//flushdb：删除当前数据库的所有key(慎用)
//flushall：删除所有数据库的所有数据(更慎用)


//redis持久化aof(append-only-file)
//开启持久化 appendonly yes
//手动重写  bgrewriteaof	

//redis设置密码  requirepass 123

//redis事物（Transaction）命令
//DISCARD	取消事务，放弃执行事务块内的所有命令。
//EXEC	执行所有事务块内的命令。
//MULTI	开启事物
//UNWATCH	取消 WATCH 命令对所有 key 的监视。
//WATCH key	监视一个(或多个) key ，如果在事务执行之前这个(或这些) key 被其他命令所改动，那么事务将被打断。

// https://www.cnblogs.com/caesar-id/p/10846541.html
// https://www.cnblogs.com/cymbook/p/9510482.html


//git

//A：本地新增的文件（服务器上没有）
//C：文件的一个新拷贝
//D：本地删除的文件（服务器上还在）
//M：红色为修改过未被添加进暂存区的，绿色为已经添加进暂存区的
//R：文件名被修改
//T：文件的类型被修改
//U：文件没有被合并(你需要完成合并才能进行提交)
//X：未知状态(很可能是遇到git的bug了，你可以向git提交bug report)
//?：未被git进行管理，可以使用git add fileName把文件添加进来进行管理



//下载地址 https://git-scm.com/downloads

//配置基本信息
//git config --global user.name "liu"    配置名字
//git config --global user.email "liu@qq.com"   配置邮箱

// 获取常见的命令帮助信息
//git  help 命令 ：表示获取该命令的详细使用信息（网页打开）
//或  git 命令 -h （终端提示,常用）

// 在现有的目录中初始化仓库
// 在项目目录中，通过鼠标右键打开 "Git Bash"
// 执行 git init 命令会将当前当前目录转化为git仓库

//git仓库下文件的4中状态
//未跟踪 未修改 已修改 已暂存

//git status ：查看仓库文件状态
//git status --short ：查看仓库文件状态精简版
//git status -s：查看仓库文件状态精简版等同于git status --short

//git add 文件名	：把文件添加到暂存区准备提交
//git commit -m "注释(描述备注信息)" ：提交到git仓库并注释

//撤销对文件的修改
//git checkout -- 文件名：拿git仓库的该文件覆盖工作区的该文件(慎用)

//一次性提交到暂存区
//git add . ：一次性提交所有的未追踪和已修改的文件到暂存区

//取消已暂存文件(不会影响已修改的内容)
//git reset HEAD 文件名：把该文件从暂存区中撤销到工作区
//git reset HEAD . ：撤销暂存区所有的文件到工作区

//直接跳过暂存区提交到仓库
//git commit -a -m "描述信息" ：可以提交暂存区和已修改的所有文件，但不能提交未追踪的文件

//移除文件
//git rm -f 文件名：删除git仓库的该文件，并且工作区的该文件也被删除(慎用)
//git rm --cached 文件名：删除git仓库的该文件，不会删除工作区该文件

//忽略文件配置
//可以建一个.gitignore的配置文件，列出忽略文件的匹配模式。建.gitignore文件使用命令是：touch .gitignore

//配置编写规则
//以#开头是注释		以/结尾是目录		以/开头是防止递归		以!开始是取反

//git log 按时间顺序列出提交历史
//git log -2 只展示最新的两条提交历史
//git log -2 --pretty=oneline  在一行上展示最近两条提交历史信息

// %h 提交的简写哈希值 %an作者名字 %ar作者修订日期 %s提交说明
//git log -2 --pretty=format:"%h|$an|%ar|%s"

//git reset --hard <CommitID>   根据指定的提交ID退回指定版本




//git 常用单词
//git config --global user.name "liu"    		配置名字
//git config --global user.email "liu@qq.com"   配置邮箱
//git init 							执行命令会将当前当前目录转化为git仓库
//git status -s          		 	查看仓库文件状态精简版等同于git status --short
//git add . 							一次性提交所有的未追踪和已修改的文件到暂存区
//git commit -m "注释(描述备注信息)"    提交到git仓库并注释
//git commit -a -m "描述信息" 			可以提交暂存区和已修改的所有文件，但不能提交未追踪的文件
//git rm --cached 文件名：删除git仓库的该文件，不会删除工作区该文件


//github 
//git remote add origin (https/ssh)		将本地仓库和远程仓库进行关联 并把远程仓库命名为origin
//git remote rm origin					先删除之前的http连接
//git push -u origin master				将本地仓库中的内容推送到远程的origin仓库中
//ssh-keygen -t rsa -b 4096 -C "1711309700@qq.com"   生成ssh key 
//ssh -T git@github.com   				检测ssh key是否配置成功
//git clone    			  				将远程仓库克隆到本地远程仓库地址

//git branch 						查看本地仓库的分支
//git branch 分支名称  				基于当前分支，创建一个新的分支
//git checkout login  				切换到指定分支
//git checkout -b 分支名称  		创建新分支并切换到新分支上
//git merge login 					把别的分支代码合并过来 如果有冲突手动解决后提交到仓库就好了
//git branch -d 分支名称    		删除本地仓库分支 需要删除分支，不能处于删除分支上         如果分支代码没有合并到master主干，系统将不能删除分支，若要强行删除分支，可用git branch -D 分支名 强行删除

//git push -u origin login:login   远程仓库名称 本地分支名称:远程仓库名称    	把分支推送到远程仓
//git push 远程仓库名称 --delete   远程仓库名称   删除远程仓库
//git remote show origin 			查看远程仓库的所有分支
//git checkout -b 本地分支名称 		远程仓库名称/远程分支名称   从github下载分支到本地需要重命名项目
//git checkout 远程分支名称     	从github下载分支到本地不需要重命名项目	 
//git pull 							拉取当前分支最新的代码


// Yii
//Yii官方文档：https://www.yiichina.com/doc/guide/2.0/structure-overview
//Composer通过安装yii  composer create-project --prefer-dist yiisoft/yii2-app-basic basic


// laravel
// https://xueyuanjun.com/  laravel文档
//composer安装（或百度安装步骤安装）
//Composr 官方网站：https://getcomposer.org/
//Composer 中文官网：http://www.phpcomposer.com/

//在cmd中进入到laravel项目目录 输入：php artisan --version  查看laravel版本

//php_openssl.dll	php_fileinfo.dll
// php.ini 要改的

//Laravel 使用 Composer 来管理项目依赖。因此，在使用 Laravel 之前，请确保你的机器已经安装了 
//composer selfupdate   更新 Composer 
//Composer。首先，通过使用 Composer 安装 Laravel 安装器：
//composer global require laravel/installer
//命令来安装 Laravel	composer create-project --prefer-dist laravel/laravel laravel "5.5.*"
//Composer国内全量镜像大全	https://www.php.cn/toutiao-425131.html
// 可以使用 composer config -l -g 查看所有全局配置
//查找自己想要的软件包通过composer	推荐：www.packagist.org			eg:captcha验证码安装和使用
//读取composer.json内容，解析依赖关系，安装依赖包到vendor目录下
//composer install    命令读取composer.json内容
//composer安装laravel	命令：composer -v create-project laravel/laravel laravel

// Route::get('/', function () {return view('welcome');});   基本路由
// Route::get('/index','indexController@index');    路由到控制器的方法
//Route::match(['get','post'],'/index','indexController@index');	可以get跟post
//Route::any(['/index','indexController@index');	可以所有方式提交

//dd()函数用来打印出给定的变量和结束脚本的运行

// artisan脚本生成控制器  php artisan make:controller index/indexController
//artisan 生成模型   php artisan make:model usermodel
//生成中间件	命令：php artisan make:middleware 中间件名
//创建数据迁移   php artisan make:migration create_users_table	   运行迁移 php artisan migrate
//生成种子文件   php artisan make:seeder UserTableSeeder 
//php artisan db:seed							     (执行所有种子文件)
//php artisan db:seed --class=UserTableSeeder       (指定执行哪个种子文件)(推荐)

// ->middleware('login');	调用中间件

/*自定义模型一般需要以下几个属性的参数
protected $table='hh';			//真实姓名
protected $primarykey='id';		//主键字段，默认为id
protected $fillable = ['name','password'];	// 可以操作的字段
public $timestamps=false;	*/				// 不需要laravel自动管理创建时间与修改时间


//视图跟传参	view('文件名.视图名' , ['分配变量' => '分配值']);
//模板标签语法  {{分配变量名}}
// 模型文件引入  src="{{asset('地址')}}"
// foreach 循环
//@foreach ($data as $v)	@endforeach
//if 判断	@if()	@elseif		@else		@endif 

//获取获取单个的输入值。不填参数等同于all()方法接收全部。
//public function a(Request $request){
//	$request-> input ();
//}

//isMethod():判断请求方法。
//if($request->isMethod('get')){
//}else if($request->isMethod('post')){
//}

// json 响应
// return response()->json(['name'=>'hh','state'=>'ca']);
// http响应
// return response('hello world',200)->header('content-type','text/html;charset=utf-8');

//设置cookie
//return response('')->withCookie('name','xiaoming',10);	有效期分钟
//取cookid    Cookie::get('name'); 

// Eloquent ORM模型
// 编写自定义模型一般需要以下几个属性的参数
// protected $table='user';		         	 真实表名
// protected $primarykey='id';			 	 字段主键，默认为id
// protected $fillable=['name','age'];		  可以操作的字段
// public $timestamps=false;				不需要laravel自动管理创建时间与修改时间

// use App\UserModel;
// $lst=UserModel::all();	查
// $add=UserModel::create($request->all())->save();   增
// $edit=UserModel::find($id)->update($request->all());  改
// $del=UserModel::find($id); $del->delete(); 	   删


// 原生sql 查询
// DB::insert("insert into user values(null,'name')");		增
// DB::select("select * from user");						查
// DB::update("update user set name='hh' where id=1");		改
// DB::delete("delete from user where id=1");				删

//$sql="select * from user where id=:id";
//$zhanwei=[
//	'id'=>1,
//];
//$res=DB::select($sql,$zhanwei);			占位符

//构建器  类似TP连贯操作
// DB::tanle('user')->get();		返回所有数据

// where 条件
//$where=[
//	['id',1],
//	['name','a']
//];

// $where=[
//	['id','>',1],
//	['name','=','hh']
//];
// DB::table('user')->where($where)->first();		 获取单条记录

// DB::table('user')->pluck('name','id');			获取一列数据

// DB::table('user')->insert(['name'=>'xiaomin']);    // insert() : 返回布尔值
// DB::table('user')->insertGetId(['name'=>'xiaomin']);  // insertGetId() : 返回插入id

// DB::table('user')->where('id','1')->update(['name'=>'xiaoli']);
// DB::table('user')->where('id','>','3')->delete();































//Mysql引擎

//MyIASM引擎  速度快但不支持锁跟事务
//InnoDB引擎	  速度比myiasm 慢 但支持锁跟事务

//MyISAM类型不支持事务，表锁，易产生碎片，要经常优化，读写速度较快，而InnoDB类型支持事务，行锁，有崩溃恢复能力。读写速度比MyISAM慢



//使用命令更改引擎 alter table table_name type = InnoDB;
//查看使用的引擎  show create table xm_user;




























































?>
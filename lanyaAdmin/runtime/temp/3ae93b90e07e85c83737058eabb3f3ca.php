<?php /*a:2:{s:59:"/www/wwwroot/yj.shningmi.com/app/admin/view/menu/index.html";i:1644810384;s:53:"/www/wwwroot/yj.shningmi.com/app/admin/view/main.html";i:1644810384;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:''),ENT_QUOTES); ?><div class="pull-right"><!--<?php if($type == 'index' and auth("add")): ?>--><button data-modal='<?php echo url("add"); ?>' data-title="添加菜单" class='layui-btn layui-btn-sm layui-btn-primary'>添加菜单</button><!--<?php endif; ?>--><!--<?php if($type == 'index' and auth("state")): ?>--><button data-action='<?php echo url("state"); ?>' data-csrf="<?php echo systoken('state'); ?>" data-rule="id#{key};status#0" class='layui-btn layui-btn-sm layui-btn-primary'>禁用菜单</button><!--<?php endif; ?>--><!--<?php if($type == 'recycle' and auth("state")): ?>--><button data-action='<?php echo url("state"); ?>' data-csrf="<?php echo systoken('state'); ?>" data-rule="id#{key};status#1" class='layui-btn layui-btn-sm layui-btn-primary'>激活菜单</button><!--<?php endif; ?>--></div></div><?php endif; ?><div class="layui-card-body"><div class="layui-card-html"><div class="layui-tab layui-tab-card"><ul class="layui-tab-title"><?php foreach(['index'=>'系统菜单','recycle'=>'回 收 站'] as $k=>$v): if(isset($type) and $type == $k): ?><li class="layui-this color-green" data-open="<?php echo url('index'); ?>?type=<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?></li><?php else: ?><li data-open="<?php echo url('index'); ?>?type=<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?></li><?php endif; ?><?php endforeach; ?></ul><div class="layui-tab-content"><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><div class="notdata">没有记录哦</div><?php else: ?><table class="layui-table" lay-skin="line"><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><th class='list-table-sort-td'><button type="button" data-reload class="layui-btn layui-btn-xs">刷 新</button></th><th class='text-center' style="width:30px"></th><th style="width:230px"></th><th class='layui-hide-xs' style="width:180px"></th><th colspan="2"></th></tr></thead><tbody><?php foreach($list as $key=>$vo): ?><tr data-dbclick class="<?php if(($type == 'index' and $vo['status'] == 0)): ?>layui-hide<?php endif; ?>"><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" value='<?php echo htmlentities($vo['ids'],ENT_QUOTES); ?>' type='checkbox'></label></td><td class='list-table-sort-td'><input data-action-blur="<?php echo sysuri(); ?>" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>;action#sort;sort#{value}" data-loading="false" value="<?php echo htmlentities($vo['sort'],ENT_QUOTES); ?>" class="list-sort-input"></td><td class='text-center'><i class="<?php echo htmlentities($vo['icon'],ENT_QUOTES); ?> font-s18"></i></td><td class="nowrap"><span class="color-desc"><?php echo $vo['spl']; ?></span><?php echo htmlentities($vo['title'],ENT_QUOTES); ?></td><td class='layui-hide-xs layui-elip'><?php echo htmlentities($vo['url'],ENT_QUOTES); ?></td><td class='text-center nowrap'><?php if($vo['status'] == '0'): ?><span class="color-red">已禁用</span><?php else: ?><span class="color-green">已激活</span><?php endif; ?></td><td class='text-center nowrap notselect'><?php if(isset($type) and $type == 'index'): if(auth("add")): ?><!--<?php if($vo['spt'] < 2): ?>--><a class="layui-btn layui-btn-sm layui-btn-primary" data-title="添加子菜单" data-modal='<?php echo url("add"); ?>?pid=<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>'>添 加</a><!--<?php else: ?>--><a class="layui-btn layui-btn-sm layui-btn-disabled">添 加</a><!--<?php endif; ?>--><?php endif; ?><!--<?php if(auth("edit")): ?>--><a data-dbclick class="layui-btn layui-btn-sm" data-title="编辑菜单" data-modal='<?php echo url("edit"); ?>?id=<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>'>编 辑</a><!--<?php endif; ?>--><!--<?php if($vo['status'] == 1 and auth("state")): ?>--><a class="layui-btn layui-btn-warm layui-btn-sm" data-confirm="确定要禁用菜单吗？" data-action="<?php echo url('state'); ?>" data-value="id#<?php echo htmlentities($vo['ids'],ENT_QUOTES); ?>;status#0" data-csrf="<?php echo systoken('state'); ?>">禁 用</a><!--<?php endif; ?>--><?php else: ?><!--<?php if(auth("state")): ?>--><a class="layui-btn layui-btn-warm layui-btn-sm" data-confirm="确定要激活菜单吗？" data-action="<?php echo url('state'); ?>" data-value="id#<?php echo htmlentities($vo['ids'],ENT_QUOTES); ?>;status#1" data-csrf="<?php echo systoken('state'); ?>">激 活</a><!--<?php endif; ?>--><!--<?php if(auth("remove") and ($vo['spc']<1 or $vo['status']<1)): ?>--><a class="layui-btn layui-btn-danger layui-btn-sm" data-confirm="确定要删除菜单吗?" data-action="<?php echo url('remove'); ?>" data-value="id#<?php echo htmlentities($vo['ids'],ENT_QUOTES); ?>" data-csrf="<?php echo systoken('remove'); ?>">删 除</a><!--<?php endif; ?>--><!--<?php if(auth("remove") and $vo['spc']>0 and $vo['status']>0): ?>--><a class="layui-btn layui-btn-disabled layui-btn-sm">删 除</a><!--<?php endif; ?>--><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php endif; ?></div></div></div></div></div>
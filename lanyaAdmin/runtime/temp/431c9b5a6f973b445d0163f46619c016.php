<?php /*a:2:{s:67:"/www/wwwroot/yj.shningmi.com/app/data/view/base/discount/index.html";i:1644810384;s:69:"/www/wwwroot/yj.shningmi.com/app/data/view/../../admin/view/main.html";i:1644810384;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:''),ENT_QUOTES); ?><div class="pull-right"><!--<?php if(auth("add")): ?>--><button class='layui-btn layui-btn-sm layui-btn-primary' data-modal="<?php echo url('add'); ?>" data-title="添加折扣方案">添加折扣方案</button><!--<?php endif; ?>--></div></div><?php endif; ?><div class="layui-card-body"><div class="layui-card-html"><div class="think-box-notify">
    特别注意：当用户等级删除或修改之后，此处折扣方案也需要重新配置！
</div><div class="think-box-shadow margin-top-10"><table class="layui-table" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><th class='list-table-sort-td'><button class="layui-btn layui-btn-xs" data-reload type="button">刷 新</button></th><th class="text-left nowrap">折扣方案</th><th class="text-left nowrap">等级折扣</th><th class="text-left nowrap">使用状态</th><th></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" type='checkbox' value='<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>'></label></td><td class='list-table-sort-td'><label><input class="list-sort-input" data-action-blur="<?php echo request()->url(); ?>" data-loading="false" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>;action#sort;sort#{value}" value="<?php echo htmlentities($vo['sort'],ENT_QUOTES); ?>"></label></td><td class="text-left nowrap"><?php echo htmlentities((isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''),ENT_QUOTES); ?></td><td class="text-left"><?php foreach($vo['items'] as $v): ?><span class="layui-badge-rim margin-right-5 margin-bottom-5 nowrap"><b class="color-green">VIP<?php echo htmlentities($v['level'],ENT_QUOTES); ?></b> : <b class="color-blue"><?php echo htmlentities($v['discount']+0,ENT_QUOTES); ?>%</b></span><?php endforeach; ?></td><td class='text-left nowrap'><?php if($vo['status'] == 0): ?><span class="color-red">已禁用</span><?php elseif($vo['status'] == 1): ?><span class="color-green">使用中</span><?php endif; ?></td><td class='text-left nowrap'><!--<?php if(auth("edit")): ?>--><a class="layui-btn layui-btn-sm" data-modal='<?php echo url("edit"); ?>?id=<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>' data-title="编辑折扣方案">编 辑</a><!--<?php endif; ?>--><!--<?php if(auth("state") and $vo['status'] == 1): ?>--><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('state'); ?>" data-csrf="<?php echo systoken('state'); ?>" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>;status#0">禁 用</a><!--<?php elseif(auth("state")): ?>--><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('state'); ?>" data-csrf="<?php echo systoken('state'); ?>" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>;status#1">启 用</a><!--<?php endif; ?>--><!--<?php if(auth("remove")): ?>--><a class="layui-btn layui-btn-sm layui-btn-danger" data-action="<?php echo url('remove'); ?>" data-confirm="确定要删除折扣方案吗？" data-csrf="<?php echo systoken('remove'); ?>" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>">删 除</a><!--<?php endif; ?>--></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div></div>
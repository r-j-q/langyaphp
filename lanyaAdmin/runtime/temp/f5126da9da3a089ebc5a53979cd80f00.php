<?php /*a:3:{s:67:"/www/wwwroot/yj.shningmi.com/app/data/view/news/feedback/index.html";i:1684137022;s:69:"/www/wwwroot/yj.shningmi.com/app/data/view/../../admin/view/main.html";i:1644810384;s:74:"/www/wwwroot/yj.shningmi.com/app/data/view/news/feedback/index_search.html";i:1684135804;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:''),ENT_QUOTES); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><div class="layui-card-html"><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form action="<?php echo request()->url(); ?>" autocomplete="off" class="layui-form layui-form-pane form-search" method="get" onsubmit="return false"><div class="layui-form-item layui-inline"><label class="layui-form-label">用户昵称</label><label class="layui-input-inline"><input class="layui-input" name="nickname" placeholder="请输入用户昵称" value="<?php echo htmlentities((isset($get['nickname']) && ($get['nickname'] !== '')?$get['nickname']:''),ENT_QUOTES); ?>"></label></div><?php if((0)): ?><div class="layui-form-item layui-inline"><label class="layui-form-label">使用状态</label><div class="layui-input-inline"><select class="layui-select" name="status"><option value=''>-- 全部 --</option><?php foreach(['已禁用的记录','已激活的记录'] as $k=>$v): if($k.'' == input('status')): ?><option selected value="<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?></option><?php else: ?><option value="<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><?php endif; ?><div class="layui-form-item layui-inline"><label class="layui-form-label">创建时间</label><label class="layui-input-inline"><input class="layui-input" data-date-range name="create_at" placeholder="请选择创建时间" value="<?php echo htmlentities((isset($get['create_at']) && ($get['create_at'] !== '')?$get['create_at']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form></fieldset><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><!-- <th class='list-table-sort-td'><button class="layui-btn layui-btn-xs" data-reload type="button">刷 新</button></th> --><th class="text-left nowrap">用户昵称</th><th class="text-left nowrap">产品</th><th class="text-left nowrap">软件和服务</th><th class="text-left nowrap">镜片和应用</th><th class="text-left nowrap">意见建议</th><th class="text-left nowrap">创建时间</th><?php if((0)): ?><th class="text-left nowrap"></th><?php endif; ?></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr data-dbclick><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" type='checkbox' value='<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>'></label></td><!-- <td class='list-table-sort-td'><label><input class="list-sort-input" data-action-blur="<?php echo request()->url(); ?>" data-loading="false" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>;action#sort;sort#{value}" value="<?php echo htmlentities((isset($vo['sort']) && ($vo['sort'] !== '')?$vo['sort']:'0'),ENT_QUOTES); ?>"></label></td> --><td class="text-left nowrap"><?php echo htmlentities((isset($vo['nickname']) && ($vo['nickname'] !== '')?$vo['nickname']:''),ENT_QUOTES); ?></td><td class="text-left nowrap"><div class="inline-block"><div>产品款式：<span class="color-<?php echo !empty($vo['kuanshi']) ? 'green' : 'red'; ?>"><?php echo !empty($vo['kuanshi']) ? '满意' : '不满意'; ?></span></div><div>产品设计：<span class="color-<?php echo !empty($vo['sheji']) ? 'green' : 'red'; ?>"><?php echo !empty($vo['sheji']) ? '满意' : '不满意'; ?></span></div><div>产品包装：<span class="color-<?php echo !empty($vo['baozhuang']) ? 'green' : 'red'; ?>"><?php echo !empty($vo['baozhuang']) ? '满意' : '不满意'; ?></span></div><div>产品价格：<span class="color-<?php echo !empty($vo['jiage']) ? 'green' : 'red'; ?>"><?php echo !empty($vo['jiage']) ? '满意' : '不满意'; ?></span></div></div></td><td class="text-left nowrap"><div class="inline-block"><div>软件界面：<span class="color-<?php echo !empty($vo['jiemian']) ? 'green' : 'red'; ?>"><?php echo !empty($vo['jiemian']) ? '满意' : '不满意'; ?></span></div><div>软件功能：<span class="color-<?php echo !empty($vo['gongneng']) ? 'green' : 'red'; ?>"><?php echo !empty($vo['gongneng']) ? '满意' : '不满意'; ?></span></div><div>服务态度：<span class="color-<?php echo !empty($vo['taidu']) ? 'green' : 'red'; ?>"><?php echo !empty($vo['taidu']) ? '满意' : '不满意'; ?></span></div><div>服务专业性：<span class="color-<?php echo !empty($vo['zhuanyexing']) ? 'green' : 'red'; ?>"><?php echo !empty($vo['zhuanyexing']) ? '满意' : '不满意'; ?></span></div></div></td><td class="text-left nowrap"><div class="inline-block"><div>想要的镜片：<span class="color-text"><?php echo htmlentities((isset($vo['jingpian']['name']) && ($vo['jingpian']['name'] !== '')?$vo['jingpian']['name']:''),ENT_QUOTES); ?></span></div><div>想要的应用功能：<span class="color-text"><?php echo htmlentities((isset($vo['yingyong']['name']) && ($vo['yingyong']['name'] !== '')?$vo['yingyong']['name']:''),ENT_QUOTES); ?></span></div></div></td><td class="text-left"><?php echo htmlentities((isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:''),ENT_QUOTES); ?></td><td class="text-left nowrap"><?php echo htmlentities(format_datetime($vo['create_at']),ENT_QUOTES); ?></td><?php if((0)): ?><td class='text-left nowrap'><!--<?php if(auth("edit")): ?>--><a class="layui-btn layui-btn-sm" data-dbclick data-modal="<?php echo url('edit'); ?>?id=<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>" data-title="回复<?php echo htmlentities((isset($vo['nickname']) && ($vo['nickname'] !== '')?$vo['nickname']:''),ENT_QUOTES); ?>" data-width="500px">回 复</a><!--<?php endif; ?>--><!--<?php if(auth("state") and $vo['status'] == 1): ?>--><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('state'); ?>" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>;status#0">无 效</a><!--<?php endif; ?>--><!--<?php if(auth("state") and $vo['status'] == 0): ?>--><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('state'); ?>" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>;status#1">正 常</a><!--<?php endif; ?>--><!--<?php if(auth("remove")): ?>--><a class="layui-btn layui-btn-sm layui-btn-danger" data-action="<?php echo url('remove'); ?>" data-confirm="确定要删除该标签吗？" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>">删 除</a><!--<?php endif; ?>--></td><?php endif; ?></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div><script>window.form.render()</script></div>
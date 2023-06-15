<?php /*a:3:{s:66:"/www/wwwroot/yj.shningmi.com/app/data/view/user/balance/index.html";i:1644810384;s:69:"/www/wwwroot/yj.shningmi.com/app/data/view/../../admin/view/main.html";i:1644810384;s:73:"/www/wwwroot/yj.shningmi.com/app/data/view/user/balance/index_search.html";i:1644810384;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:''),ENT_QUOTES); ?><div class="pull-right"><!--<?php if(auth("remove")): ?>--><button class='layui-btn layui-btn-sm layui-btn-primary' data-action='<?php echo url("remove"); ?>' data-confirm="确定要删除这些充值记录吗？" data-rule="id#{key}">删除充值</button><!--<?php endif; ?>--></div></div><?php endif; ?><div class="layui-card-body"><div class="layui-card-html"><div class="think-box-notify">
    余额统计：累计已充值余额 <b><?php echo htmlentities((isset($balance['0']) && ($balance['0'] !== '')?$balance['0']:0.00),ENT_QUOTES); ?></b> 元，已使用 <b><?php echo htmlentities((isset($balance['1']) && ($balance['1'] !== '')?$balance['1']:0.00),ENT_QUOTES); ?></b> 元，剩余可使用 <b><?php echo htmlentities($balance['0']-$balance['1'],ENT_QUOTES); ?></b> 元。
</div><div class="think-box-shadow margin-top-10"><fieldset><legend>条件搜索</legend><form action="<?php echo htmlentities($request->url(),ENT_QUOTES); ?>" autocomplete="off" class="layui-form layui-form-pane form-search" method="get" onsubmit="return false"><div class="layui-form-item layui-inline"><label class="layui-form-label">用户手机</label><label class="layui-input-inline"><input class="layui-input" name="user_phone" placeholder="请输入用户手机" value="<?php echo htmlentities((isset($get['user_phone']) && ($get['user_phone'] !== '')?$get['user_phone']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">用户昵称</label><label class="layui-input-inline"><input class="layui-input" name="user_nickname" placeholder="请输入用户昵称" value="<?php echo htmlentities((isset($get['user_nickname']) && ($get['user_nickname'] !== '')?$get['user_nickname']:''),ENT_QUOTES); ?>"></label></div><!--<?php if(!(empty($upgrades) || (($upgrades instanceof \think\Collection || $upgrades instanceof \think\Paginator ) && $upgrades->isEmpty()))): ?>--><div class="layui-form-item layui-inline"><label class="layui-form-label">升级等级</label><div class="layui-input-inline"><select class="layui-select" name="upgrade"><option value="">-- 全部 --</option><?php foreach($upgrades as $upgrade): if(input('upgrade') == $upgrade['number'].''): ?><option selected value="<?php echo htmlentities((isset($upgrade['number']) && ($upgrade['number'] !== '')?$upgrade['number']:0),ENT_QUOTES); ?>">[ <?php echo htmlentities((isset($upgrade['number']) && ($upgrade['number'] !== '')?$upgrade['number']:'0'),ENT_QUOTES); ?> ] <?php echo htmlentities((isset($upgrade['name']) && ($upgrade['name'] !== '')?$upgrade['name']:''),ENT_QUOTES); ?></option><?php else: ?><option value="<?php echo htmlentities((isset($upgrade['number']) && ($upgrade['number'] !== '')?$upgrade['number']:0),ENT_QUOTES); ?>">[ <?php echo htmlentities((isset($upgrade['number']) && ($upgrade['number'] !== '')?$upgrade['number']:'0'),ENT_QUOTES); ?> ] <?php echo htmlentities((isset($upgrade['name']) && ($upgrade['name'] !== '')?$upgrade['name']:''),ENT_QUOTES); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><!--<?php endif; ?>--><!--<?php if(!(empty($names) || (($names instanceof \think\Collection || $names instanceof \think\Paginator ) && $names->isEmpty()))): ?>--><div class="layui-form-item layui-inline"><label class="layui-form-label">充值名称</label><div class="layui-input-inline"><select class="layui-select" name="name"><option value="">-- 全部 --</option><?php foreach($names as $name): if(input('name') == $name): ?><option selected value="<?php echo htmlentities($name,ENT_QUOTES); ?>"><?php echo htmlentities($name,ENT_QUOTES); ?></option><?php else: ?><option value="<?php echo htmlentities($name,ENT_QUOTES); ?>"><?php echo htmlentities($name,ENT_QUOTES); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><!--<?php endif; ?>--><div class="layui-form-item layui-inline"><label class="layui-form-label">充值备注</label><label class="layui-input-inline"><input class="layui-input" name="remark" placeholder="请输入充值备注" value="<?php echo htmlentities((isset($get['remark']) && ($get['remark'] !== '')?$get['remark']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">操作时间</label><label class="layui-input-inline"><input class="layui-input" data-date-range name="create_at" placeholder="请选择操作时间" value="<?php echo htmlentities((isset($get['create_at']) && ($get['create_at'] !== '')?$get['create_at']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form><script>layui.form.render()</script></fieldset><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><th class='text-left nowrap'>用户信息</th><th class='text-left nowrap'>充值金额</th><th class='text-left nowrap'>充值描述</th><th></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" type='checkbox' value='<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>'></label></td><td class="nowrap"><div class="headimg headimg-md" data-lazy-src="<?php echo htmlentities((isset($vo['user']['headimg']) && ($vo['user']['headimg'] !== '')?$vo['user']['headimg']:'/static/theme/img/headimg.png'),ENT_QUOTES); ?>" data-tips-image></div><div class="inline-block"><div>用户昵称：<span class="color-text"><?php echo htmlentities((isset($vo['user']['nickname']) && ($vo['user']['nickname'] !== '')?$vo['user']['nickname']:'--'),ENT_QUOTES); ?></span></div><div>用户手机：<span class="color-text"><?php echo htmlentities((isset($vo['user']['phone']) && ($vo['user']['phone'] !== '')?$vo['user']['phone']:'--'),ENT_QUOTES); ?></span></div><div>用户等级：<span>[ <b class="color-red">VIP<?php echo htmlentities($vo['user']['vip_code'],ENT_QUOTES); ?></b> ] <b class="color-red"><?php echo htmlentities($vo['user']['vip_name'],ENT_QUOTES); ?></b></span></div></div></td><td class="nowrap"><div>交易金额：<?php if($vo['amount']>=0): ?><b class="color-green"><?php echo htmlentities($vo['amount']+0,ENT_QUOTES); ?></b><?php else: ?><b class="color-blue"><?php echo htmlentities($vo['amount']+0,ENT_QUOTES); ?></b><?php endif; ?> 元</div><div>升级等级：<?php if($vo['upgrade']>0): ?><span class="color-red">升级到</span> [ <b class="color-red">VIP<?php echo htmlentities($vo['upgrade'],ENT_QUOTES); ?></b> ] <b class="color-red"><?php echo htmlentities((isset($vo['upgradeinfo']['name']) && ($vo['upgradeinfo']['name'] !== '')?$vo['upgradeinfo']['name']:''),ENT_QUOTES); ?></b><?php else: ?><span class="color-desc">不进行用户升级</span><?php endif; ?></div><div>操作时间：<span><?php echo htmlentities(format_datetime($vo['create_at']),ENT_QUOTES); ?></span></div></td><td class="nowrap sub-strong-blue"><div>充值名称：<?php echo htmlentities((isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:'-'),ENT_QUOTES); ?></div><div>充值单号：<b class="color-blue"><?php echo htmlentities((isset($vo['code']) && ($vo['code'] !== '')?$vo['code']:'-'),ENT_QUOTES); ?></b></div><!--<?php if(!(empty($vo['remark']) || (($vo['remark'] instanceof \think\Collection || $vo['remark'] instanceof \think\Paginator ) && $vo['remark']->isEmpty()))): ?>--><div>充值备注：<?php echo htmlentities($vo['remark'],ENT_QUOTES); ?></div><!--<?php else: ?>--><div>充值备注：<span class="color-desc">未填写充值记录的备注内容</span></div><!--<?php endif; ?>--></td><td class="nowrap"><!--<?php if(auth("remove") and stripos($vo['code'],'B') === 0): ?>--><a class="layui-btn layui-btn-sm layui-btn-danger" data-action="<?php echo url('remove'); ?>" data-confirm="确定要删除数据吗?" data-value="id#<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>">删 除</a><!--<?php endif; ?>--></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div></div>
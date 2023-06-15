<?php /*a:3:{s:63:"/www/wwwroot/yj.shningmi.com/app/data/view/shop/send/index.html";i:1644810384;s:69:"/www/wwwroot/yj.shningmi.com/app/data/view/../../admin/view/main.html";i:1644810384;s:70:"/www/wwwroot/yj.shningmi.com/app/data/view/shop/send/index_search.html";i:1644810384;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:''),ENT_QUOTES); ?><div class="pull-right"><!--<?php if(auth('config')): ?>--><a class="layui-btn layui-btn-sm layui-btn-primary" data-modal="<?php echo url('config'); ?>">发货地址管理</a><!--<?php endif; ?>--></div></div><?php endif; ?><div class="layui-card-body"><div class="layui-card-html"><div class="layui-tab layui-tab-card"><ul class="layui-tab-title notselect"><?php foreach(['ta'=>'全部订单','t1'=>'等待发货','t2'=>'已经发货','t0'=>'已经取消'] as $k => $v): if(isset($type) and 't'.$type == $k): ?><li class="layui-this" data-open="<?php echo url('index'); ?>?type=<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?><sup class="layui-badge border-radius"><?php echo isset($total[$k]) ? htmlentities($total[$k],ENT_QUOTES) : 0; ?></sup></li><?php else: ?><li data-open="<?php echo url('index'); ?>?type=<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?><sup class="layui-badge border-radius"><?php echo isset($total[$k]) ? htmlentities($total[$k],ENT_QUOTES) : 0; ?></sup></li><?php endif; ?><?php endforeach; ?></ul><div class="layui-tab-content"><fieldset><legend>条件搜索</legend><form action="<?php echo request()->url(); ?>" autocomplete="off" class="layui-form layui-form-pane form-search" method="get" onsubmit="return false"><div class="layui-form-item layui-inline"><label class="layui-form-label">用户手机</label><label class="layui-input-inline"><input class="layui-input" name="user_phone" placeholder="请输入用户手机" value="<?php echo htmlentities((isset($get['user_phone']) && ($get['user_phone'] !== '')?$get['user_phone']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">用户昵称</label><label class="layui-input-inline"><input class="layui-input" name="user_nickname" placeholder="请输入用户昵称" value="<?php echo htmlentities((isset($get['user_nickname']) && ($get['user_nickname'] !== '')?$get['user_nickname']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">订单单号</label><label class="layui-input-inline"><input class="layui-input" name="order_no" placeholder="请输入订单单号" value="<?php echo htmlentities((isset($get['order_no']) && ($get['order_no'] !== '')?$get['order_no']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">发货单号</label><label class="layui-input-inline"><input class="layui-input" name="truck_number" placeholder="请输入发货单号" value="<?php echo htmlentities((isset($get['truck_number']) && ($get['truck_number'] !== '')?$get['truck_number']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">发货状态</label><label class="layui-input-inline"><select class="layui-select" name="status"><option value="">-- 全部 --</option><?php foreach(['已经取消','等待发货','已经发货'] as $k=>$v): if(input('status') == $k.''): ?><option selected value="<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?></option><?php else: ?><option value="<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?></option><?php endif; ?><?php endforeach; ?></select></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">提交时间</label><label class="layui-input-inline"><input class="layui-input" data-date-range name="address_datetime" placeholder="请选择提交时间" value="<?php echo htmlentities((isset($get['address_datetime']) && ($get['address_datetime'] !== '')?$get['address_datetime']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">发货时间</label><label class="layui-input-inline"><input class="layui-input" data-date-range name="send_datetime" placeholder="请选择发货时间" value="<?php echo htmlentities((isset($get['send_datetime']) && ($get['send_datetime'] !== '')?$get['send_datetime']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">收货姓名</label><label class="layui-input-inline"><input class="layui-input" name="address_name" placeholder="请输入收货姓名" value="<?php echo htmlentities((isset($get['address_name']) && ($get['address_name'] !== '')?$get['address_name']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">收货手机</label><label class="layui-input-inline"><input class="layui-input" name="address_phone" placeholder="请输入收货手机" value="<?php echo htmlentities((isset($get['address_phone']) && ($get['address_phone'] !== '')?$get['address_phone']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">配送地址</label><label class="layui-input-inline"><input class="layui-input" name="address_content" placeholder="请输入配送地址" value="<?php echo htmlentities((isset($get['address_content']) && ($get['address_content'] !== '')?$get['address_content']:''),ENT_QUOTES); ?>"></label></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary" type="submit"><i class="layui-icon">&#xe615;</i> 搜 索</button><button class="layui-btn layui-btn-primary" data-form-export="<?php echo url('index'); ?>?type=<?php echo htmlentities((isset($type) && ($type !== '')?$type:''),ENT_QUOTES); ?>" type="button"><i class="layui-icon layui-icon-export"></i> 导 出
            </button></div></form></fieldset><script>
    window.form.render();
    require(['excel'], function (excel) {
        excel.bind(function (data) {
            var rows = [];
            data.forEach(function (order) {
                order.items.forEach(function (item) {
                    rows.push([
                        order.order_no,
                        item.goods_name,
                        item.goods_sku,
                        item.goods_spec,
                        item.stock_sales,
                        item.price_selling,
                        item.total_selling,
                        '<?php echo htmlentities((isset($address['name']) && ($address['name'] !== '')?$address['name']:""),ENT_QUOTES); ?>',
                        order.truck.address_idcode,
                        order.truck.address_name,
                        order.truck.address_phone,
                        order.truck.address_province,
                        order.truck.address_city,
                        order.truck.address_area,
                        order.truck.address_content,
                    ]);
                });
            });
            rows.unshift([
                '订单号', '物品名称', '物品SKU编码', '物品规格描述', '数量', '单价', '总额',
                '寄件方', '身份证号', '收货人', '电话', '省份', '城市', '区', '地址'
            ]);
            return rows;
        }, '订单发货记录');
    });
</script><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><th>用户信息</th><th>收货信息</th><th>发货状态</th><th></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" type='checkbox' value='<?php echo htmlentities($vo['id'],ENT_QUOTES); ?>'></label></td><td class="nowrap relative"><div class="headimg" data-lazy-src="<?php echo htmlentities((isset($vo['user']['headimg']) && ($vo['user']['headimg'] !== '')?$vo['user']['headimg']:'/static/theme/img/headimg.png'),ENT_QUOTES); ?>" data-tips-image style="width:56px;height:56px"></div><div class="inline-block"><div class="sub-strong-red">用户昵称：<span class="color-text"><?php echo htmlentities((isset($vo['user']['nickname']) && ($vo['user']['nickname'] !== '')?$vo['user']['nickname']:'-'),ENT_QUOTES); ?></span><span class="margin-left-5">[ <b>VIP<?php echo htmlentities($vo['user']['vip_code'],ENT_QUOTES); ?></b> ] <b><?php echo htmlentities($vo['user']['vip_name'],ENT_QUOTES); ?></b></span></div><div>用户手机：<span class="color-text"><?php echo htmlentities((isset($vo['user']['phone']) && ($vo['user']['phone'] !== '')?$vo['user']['phone']:'-'),ENT_QUOTES); ?></span></div><div class="sub-strong-blue">订单单号：<b class="color-text"><?php echo htmlentities((isset($vo['order_no']) && ($vo['order_no'] !== '')?$vo['order_no']:'-'),ENT_QUOTES); ?></b></div></div></td><td class="nowrap"><?php if(!(empty($vo['address_idcode']) || (($vo['address_idcode'] instanceof \think\Collection || $vo['address_idcode'] instanceof \think\Paginator ) && $vo['address_idcode']->isEmpty()))): ?><div>身份证号：<?php echo htmlentities((isset($vo['address_idcode']) && ($vo['address_idcode'] !== '')?$vo['address_idcode']:'-'),ENT_QUOTES); ?></div><?php endif; ?><div>收货姓名：<?php echo htmlentities((isset($vo['address_name']) && ($vo['address_name'] !== '')?$vo['address_name']:'-'),ENT_QUOTES); ?><span class="margin-left-5 color-blue"><?php echo htmlentities($vo['address_phone'],ENT_QUOTES); ?></span></div><div>收货地址：<?php echo htmlentities((isset($vo['address_province']) && ($vo['address_province'] !== '')?$vo['address_province']:'-'),ENT_QUOTES); ?><?php echo htmlentities($vo['address_city'],ENT_QUOTES); ?><?php echo htmlentities($vo['address_area'],ENT_QUOTES); ?><?php echo htmlentities($vo['address_content'],ENT_QUOTES); ?></div><div>提交时间：<?php echo htmlentities(format_datetime($vo['address_datetime']),ENT_QUOTES); ?></div></td><td class="nowrap"><?php if(empty($vo['send_datetime'])): ?><span class="layui-badge layui-bg-black">未发货</span><?php else: ?><span class="layui-badge layui-bg-blue"><?php echo htmlentities((isset($vo['company_name']) && ($vo['company_name'] !== '')?$vo['company_name']:'-'),ENT_QUOTES); ?></span><a class="layui-badge layui-bg-orange margin-left-5" data-modal="<?php echo url('shop.send/query'); ?>?code=<?php echo htmlentities($vo['company_code'],ENT_QUOTES); ?>&number=<?php echo htmlentities($vo['send_number'],ENT_QUOTES); ?>"
                       data-tips-text="快递追踪查询"
                       data-title="<?php echo htmlentities($vo['company_name'],ENT_QUOTES); ?>（<?php echo htmlentities($vo['send_number'],ENT_QUOTES); ?>）"><?php echo htmlentities((isset($vo['send_number']) && ($vo['send_number'] !== '')?$vo['send_number']:'-'),ENT_QUOTES); ?></a><div class="margin-top-5">于 <b><?php echo htmlentities(format_datetime($vo['send_datetime']),ENT_QUOTES); ?> 发货！</b></div><?php endif; ?></td><td class="color-desc"><!--<?php if(auth('shop.send/truck') and $vo['status'] == 1): ?>--><a class="layui-btn layui-btn-sm" data-modal="<?php echo url('shop.send/truck'); ?>?order_no=<?php echo htmlentities($vo['order_no'],ENT_QUOTES); ?>" data-title="填写订单信息">填写发货</a><!--<?php elseif(auth('shop.send/truck') and $vo['status'] == 2): ?>--><a class="layui-btn layui-btn-sm" data-modal="<?php echo url('shop.send/truck'); ?>?order_no=<?php echo htmlentities($vo['order_no'],ENT_QUOTES); ?>" data-title="修改发货信息">修改发货</a><!--<?php endif; ?>--></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div></div></div>
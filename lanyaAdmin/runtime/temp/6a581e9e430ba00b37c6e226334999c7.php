<?php /*a:3:{s:60:"/www/wwwroot/yj.shningmi.com/app/admin/view/oplog/index.html";i:1644810384;s:54:"/www/wwwroot/yj.shningmi.com/app/admin/view/table.html";i:1644810384;s:67:"/www/wwwroot/yj.shningmi.com/app/admin/view/oplog/index_search.html";i:1644810384;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:''),ENT_QUOTES); ?><div class="pull-right"><!--<?php if(auth("remove")): ?>--><button data-action='<?php echo url("remove"); ?>' data-rule="id#{id}" data-table-id="OplogData" data-confirm="确定要删除选中的日志吗？" class='layui-btn layui-btn-sm layui-btn-primary'>批量删除</button><!--<?php endif; ?>--><!--<?php if(auth("clear")): ?>--><button data-load='<?php echo url("clear"); ?>' data-confirm="确定要清空所有日志吗？" class='layui-btn layui-btn-sm layui-btn-primary'>清空日志</button><!--<?php endif; ?>--></div></div><?php endif; ?><div class="layui-card-body"><div class="layui-card-table"><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo sysuri(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">操作账号</label><div class="layui-input-inline"><select name='username' lay-search class="layui-select"><option value=''>-- 全部账号 --</option><?php foreach($users as $user): if($user == input('get.username')): ?><option selected value="<?php echo htmlentities($user,ENT_QUOTES); ?>"><?php echo htmlentities($user,ENT_QUOTES); ?></option><?php else: ?><option value="<?php echo htmlentities($user,ENT_QUOTES); ?>"><?php echo htmlentities($user,ENT_QUOTES); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">操作节点</label><label class="layui-input-inline"><input name="node" value="<?php echo htmlentities((isset($get['node']) && ($get['node'] !== '')?$get['node']:''),ENT_QUOTES); ?>" placeholder="请输入操作内容" class="layui-input"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">操作行为</label><div class="layui-input-inline"><select name="action" lay-search class="layui-select"><option value=''>-- 全部行为 --</option><?php foreach($actions as $action): if($action == input('get.action')): ?><option selected value="<?php echo htmlentities($action,ENT_QUOTES); ?>"><?php echo htmlentities($action,ENT_QUOTES); ?></option><?php else: ?><option value="<?php echo htmlentities($action,ENT_QUOTES); ?>"><?php echo htmlentities($action,ENT_QUOTES); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">操作描述</label><label class="layui-input-inline"><input name="content" value="<?php echo htmlentities((isset($get['content']) && ($get['content'] !== '')?$get['content']:''),ENT_QUOTES); ?>" placeholder="请输入操作内容" class="layui-input"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">访问地址</label><label class="layui-input-inline"><input name="geoip" value="<?php echo htmlentities((isset($get['geoip']) && ($get['geoip'] !== '')?$get['geoip']:''),ENT_QUOTES); ?>" placeholder="请输入访问地址" class="layui-input"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">操作时间</label><label class="layui-input-inline"><input data-date-range name="create_at" value="<?php echo htmlentities((isset($get['create_at']) && ($get['create_at'] !== '')?$get['create_at']:''),ENT_QUOTES); ?>" placeholder="请选择操作时间" class="layui-input"></label></div><div class="layui-form-item layui-inline"><button type="submit" class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button><button type="button" data-form-export="<?php echo url('index'); ?>?type=<?php echo htmlentities((isset($type) && ($type !== '')?$type:''),ENT_QUOTES); ?>" class="layui-btn layui-btn-primary"><i class="layui-icon layui-icon-export"></i> 导 出
            </button></div></form></fieldset><script>
    window.form.render();
    require(['excel'], function (excel) {
        excel.bind(function (data) {
            data.forEach(function (item, index) {
                data[index] = [item.username, item.node, item.geoip, item.geoisp, item.action, item.content, item.create_at];
            });
            data.unshift(['操作账号', '访问节点', '访问IP地址', '访问地理区域', '访问操作', '操作内容', '操作时间']);
            return data;
        }, '操作日志');
    });
</script><table id="OplogData" data-url="<?php echo sysuri(); ?>" data-target-search="form.form-search"></table></div></div></div><script>
    $(function () {
        $('#OplogData').layTable({
            even: true, height: 'full',
            sort: {field: 'id', type: 'desc'},
            cols: [[
                {checkbox: true},
                {field: 'id', title: 'ID', width: 80, sort: true, align: 'center'},
                {field: 'username', title: '操作账号', minWidth: 100, sort: true, align: 'center'},
                {field: 'node', title: '操作节点', minWidth: 120},
                {field: 'action', title: '操作行为', minWidth: 120},
                {field: 'content', title: '操作描述', minWidth: 120},
                {field: 'geoip', title: '访问地址', minWidth: 100},
                {field: 'geoisp', title: '网络服务商', minWidth: 100},
                {field: 'create_at', title: '操作时间', minWidth: 170, align: 'center', sort: true},
                {toolbar: '#toolbar', title: '操作面板', align: 'center', fixed: 'right'}
            ]]
        });
    });
</script><script type="text/html" id="toolbar"><!--<?php if(auth('remove')): ?>--><a data-action='<?php echo url("remove"); ?>' data-value="id#{{d.id}}" data-confirm="确认要删除这条记录吗？" class="layui-btn layui-btn-sm layui-btn-danger">删 除</a><!--<?php endif; ?>--></script></div>
<?php /*a:3:{s:60:"/www/wwwroot/yj.shningmi.com/app/admin/view/queue/index.html";i:1644810384;s:54:"/www/wwwroot/yj.shningmi.com/app/admin/view/table.html";i:1644810384;s:67:"/www/wwwroot/yj.shningmi.com/app/admin/view/queue/index_search.html";i:1644810384;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:''),ENT_QUOTES); ?><div class="pull-right"><!--<?php if(isset($super) and $super): ?>--><a class="layui-btn layui-btn-sm layui-btn-primary" data-queue="<?php echo url('admin/api.plugs/optimize'); ?>">优化数据库</a><!--<?php if($iswin): ?>--><button data-load='<?php echo url("admin/api.queue/start"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>开启后台服务</button><button data-load='<?php echo url("admin/api.queue/stop"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>关闭后台服务</button><!--<?php endif; ?>--><!--<?php endif; ?>--><!--<?php if(auth("clean")): ?>--><button data-queue='<?php echo url("clean"); ?>' class='layui-btn layui-btn-sm layui-btn-primary'>定时清理数据</button><!--<?php endif; ?>--><!--<?php if(auth("remove")): ?>--><button data-action='<?php echo url("remove"); ?>' data-rule="id#{id}" data-table-id="QueueData" data-confirm="确定批量删除记录吗？" class='layui-btn layui-btn-sm layui-btn-primary'>批量删除任务</button><!--<?php endif; ?>--></div></div><?php endif; ?><div class="layui-card-body"><div class="layui-card-table"><div class="think-box-shadow"><div class="layui-row layui-col-space20 portal-block-container notselect"><div class="layui-col-sm6 layui-col-md6 layui-col-lg3"><div class="portal-block-item nowrap" style="background:linear-gradient(-125deg,#57bdbf,#2f9de2)"><div class="font-w7 font-s16">等待处理</div><div><?php echo htmlentities((isset($total['pre']) && ($total['pre'] !== '')?$total['pre']:0),ENT_QUOTES); ?></div><div>待处理的任务数量</div></div><i class="portal-block-icon layui-icon layui-icon-star"></i></div><div class="layui-col-sm6 layui-col-md6 layui-col-lg3"><div class="portal-block-item nowrap" style="background:linear-gradient(-125deg,#ff7d7d,#fb2c95)"><div class="font-w7 font-s16">正在处理</div><div><?php echo htmlentities((isset($total['dos']) && ($total['dos'] !== '')?$total['dos']:0),ENT_QUOTES); ?></div><div>处理中的任务数量</div></div><i class="portal-block-icon layui-icon layui-icon-log"></i></div><div class="layui-col-sm6 layui-col-md6 layui-col-lg3"><div class="portal-block-item nowrap" style="background:linear-gradient(-113deg,#c543d8,#925cc3)"><div class="font-w7 font-s16">处理完成</div><div><?php echo htmlentities((isset($total['oks']) && ($total['oks'] !== '')?$total['oks']:0),ENT_QUOTES); ?></div><div>处理完成的任务数量</div></div><i class="portal-block-icon layui-icon layui-icon-release"></i></div><div class="layui-col-sm6 layui-col-md6 layui-col-lg3"><div class="portal-block-item nowrap" style="background:linear-gradient(-141deg,#ecca1b,#f39526)"><div class="font-w7 font-s16">处理失败</div><div><?php echo htmlentities((isset($total['ers']) && ($total['ers'] !== '')?$total['ers']:0),ENT_QUOTES); ?></div><div>处理失败的任务数量</div></div><i class="portal-block-icon layui-icon layui-icon-engine"></i></div></div><!--<?php if(isset($super) and $super): ?>--><fieldset class="margin-bottom-15"><legend class="notselect">服务状态</legend><div class="layui-code border-0 margin-top-0"><h4 class="color-desc notselect">后台服务主进程运行状态</h4><div data-queue-message>Checking task process running status ...</div><script>$('[data-queue-message]').load('<?php echo sysuri("admin/api.queue/status"); ?>')</script><h4 class="color-desc margin-top-10 notselect">配置定时任务来检查并启动进程（建议每分钟执行）</h4><div><?php echo htmlentities((isset($command) && ($command !== '')?$command:'--'),ENT_QUOTES); ?></div></div></fieldset><!--<?php endif; ?>--><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo sysuri(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">任务编号</label><label class="layui-input-inline"><input name="code" value="<?php echo htmlentities((isset($get['code']) && ($get['code'] !== '')?$get['code']:''),ENT_QUOTES); ?>" placeholder="请输入任务编号" class="layui-input"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">任务名称</label><label class="layui-input-inline"><input name="title" value="<?php echo htmlentities((isset($get['title']) && ($get['title'] !== '')?$get['title']:''),ENT_QUOTES); ?>" placeholder="请输入任务名称" class="layui-input"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">任务指令</label><label class="layui-input-inline"><input name="command" value="<?php echo htmlentities((isset($get['command']) && ($get['command'] !== '')?$get['command']:''),ENT_QUOTES); ?>" placeholder="请输入任务指令" class="layui-input"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">任务状态</label><label class="layui-input-inline"><select name="status" class="layui-select"><option value=''>-- 全部任务 --</option><?php foreach(['1'=>'等待处理','2'=>'正在处理','3'=>'处理完成','4'=>'处理失败'] as $k=>$v): if(isset($get['status']) and $get['status'] == $k): ?><option selected value="<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?></option><?php else: ?><option value="<?php echo htmlentities($k,ENT_QUOTES); ?>"><?php echo htmlentities($v,ENT_QUOTES); ?></option><?php endif; ?><?php endforeach; ?></select></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">计划时间</label><label class="layui-input-inline"><input data-date-range name="exec_time" value="<?php echo htmlentities((isset($get['exec_time']) && ($get['exec_time'] !== '')?$get['exec_time']:''),ENT_QUOTES); ?>" placeholder="请选择计划时间" class="layui-input"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">执行时间</label><label class="layui-input-inline"><input data-date-range name="enter_time" value="<?php echo htmlentities((isset($get['enter_time']) && ($get['enter_time'] !== '')?$get['enter_time']:''),ENT_QUOTES); ?>" placeholder="请选择执行时间" class="layui-input"></label></div><div class="layui-form-item layui-inline"><label class="layui-form-label">创建时间</label><label class="layui-input-inline"><input data-date-range name="create_at" value="<?php echo htmlentities((isset($get['create_at']) && ($get['create_at'] !== '')?$get['create_at']:''),ENT_QUOTES); ?>" placeholder="请选择创建时间" class="layui-input"></label></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form></fieldset><script>form.render()</script><table id="QueueData" data-url="<?php echo sysuri(); ?>" data-target-search="form.form-search"></table></div></div></div><script>
    $(function () {
        $('#QueueData').layTable({
            even: true,
            sort: {field: 'loops_time desc,code', type: 'desc'},
            cols: [[
                {checkbox: true, fixed: 'left'},
                {field: 'code', title: '任务编号', width: 140, sort: true},
                {field: 'title', title: '任务名称', minWidth: 100},
                {field: 'command', title: '任务指令', minWidth: 100},
                {
                    field: 'exec_time', title: '计划时间', minWidth: 245, templet: function (d) {
                        d.exec_time = d.exec_time || 0, d.loops_time = d.loops_time || 0;
                        if (d.loops_time > 0) {
                            return d.exec_time + ' ( 每 <b class="color-blue">' + d.loops_time + '</b> 秒 ) ';
                        } else {
                            return d.exec_time + ' <span class="color-desc">( 单次任务 )</span> ';
                        }
                    }
                },
                {
                    field: 'loops_time', title: '执行时间', minWidth: 175, templet: function (d) {
                        d.enter_time = d.enter_time || '', d.outer_time = d.outer_time || '0.0000';
                        if (d.enter_time.length > 12) {
                            return d.enter_time.substr(12) + '<span class="color-desc"> ( 耗时 ' + d.outer_time + ' )</span>';
                        } else {
                            return '<span class="color-desc">任务未执行</span>'
                        }
                    }
                },
                {field: 'attempts', title: '执行次数', minWidth: 95, align: 'center', sort: true, templet: "<div>{{d.attempts||0}}</div>"},
                {field: 'exec_desc', title: '执行结果', minWidth: 180},
                {field: 'create_at', title: '创建时间', align: 'center', minWidth: 170},
                {toolbar: '#toolbar', title: '操作面板', align: 'center', width: 260, fixed: 'right',}
            ]]
        });
    });
</script><script type="text/html" id="toolbar">
    {{# if(d.loops_time>0){ }}
    <span class="layui-badge think-bg-blue">循</span>
    {{# }else{ }}
    <span class="layui-badge think-bg-red">次</span>
    {{# } }}

    {{# if(d.rscript===1){ }}
    <span class="layui-badge layui-bg-green">复</span>
    {{# }else{ }}
    <span class="layui-badge think-bg-violet">单</span>
    {{# } }}

    {{# if(d.status===1){ }}
    <span class="layui-badge layui-bg-black">等待处理</span><span class="layui-badge think-bg-gray"><i class="layui-icon font-s12">&#xe669;</i></span>
    {{# }else if(d.status===2){ }}
    <span class="layui-badge layui-bg-green">正在处理</span><!--<?php if(auth('redo')): ?>--><span class="layui-badge think-bg-gray"><i class="layui-icon font-s12">&#xe669;</i></span><!--<?php endif; ?>-->
    {{# }else if(d.status===3){ }}
    <span class="layui-badge layui-bg-blue">处理完成</span><!--<?php if(auth('redo')): ?>--><a class="layui-badge layui-bg-green" data-confirm="确定要重置该任务吗？" data-queue="<?php echo url('redo'); ?>?code={{d.code}}"><i class="layui-icon font-s12">&#xe669;</i></a><!--<?php endif; ?>-->
    {{# }else if(d.status===4){ }}
    <span class="layui-badge layui-bg-red">处理失败</span><!--<?php if(auth('redo')): ?>--><a class="layui-badge layui-bg-green" data-confirm="确定要重置该任务吗？" data-queue="<?php echo url('redo'); ?>?code={{d.code}}"><i class="layui-icon font-s12">&#xe669;</i></a><!--<?php endif; ?>-->
    {{# } }}

    <!--<?php if(auth('remove')): ?>--><a class='layui-badge layui-bg-red' data-confirm="确定要删除该任务吗？" data-action='<?php echo url("remove"); ?>' data-value="id#{{d.id}}"><i class="layui-icon font-s12">&#xe640;</i></a><!--<?php endif; ?>--><a class='layui-badge layui-bg-orange margin-0' onclick="$.loadQueue('{{d.code}}',false,this)"><i class="layui-icon font-s12">&#xe705;</i></a></script></div>
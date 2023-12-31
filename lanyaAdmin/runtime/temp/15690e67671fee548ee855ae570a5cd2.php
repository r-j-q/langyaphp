<?php /*a:2:{s:66:"/www/wwwroot/yj.shningmi.com/app/data/view/base/config/slider.html";i:1644810384;s:69:"/www/wwwroot/yj.shningmi.com/app/data/view/../../admin/view/main.html";i:1644810384;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:''),ENT_QUOTES); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><div class="layui-card-html"><div class="think-box-shadow"><form autocomplete="off" class='layui-form layui-card' id="DataForm" onsubmit="return false;" style="width:850px"><div class="layui-card-header text-center margin-20 font-w7 color-text layui-bg-gray border-radius-5"><?php echo htmlentities((isset($title) && ($title !== '')?$title:'图片数据管理'),ENT_QUOTES); ?><span class="color-desc font-s12"> ( 建议上传图片尺寸为 690px  250px )</span></div><div class="layui-card-body margin-top-20 padding-bottom-0"><div class="padding-left-20" data-rule-list><div class="layui-form-item text-center"><a class="layui-btn layui-btn-primary" data-item-add>添加图片</a></div></div><div class="hr-line-dashed margin-top-30"></div><div class="layui-form-item text-center padding-left-20"><button class="layui-btn" data-submit>保存数据</button></div></div></form></div><div class="layui-hide" data-item-tpl><div class="layui-form-item" data-rule-item><div class="layui-input-inline nowrap relative" style="width:180px"><input data-upload-image name="img[]" type="hidden"></div><label class="layui-input-inline nowrap relative margin-bottom-5" style="width:300px"><b class="notselect color-green margin-right-5">图片名称</b><input class="layui-input inline-block" name="name[]" placeholder="请输入图片名称" required style="width:240px" value="#"><a class="layui-btn layui-btn-primary" data-item-up><i class="layui-icon layui-icon-up margin-0"></i></a><a class="layui-btn layui-btn-primary" data-item-dn><i class="layui-icon layui-icon-down margin-0"></i></a><a class="layui-btn layui-btn-primary" data-item-rm><i class="layui-icon layui-icon-close margin-0"></i></a></label><label class="layui-input-inline nowrap relative margin-bottom-5" style="width:300px"><b class="notselect color-green margin-right-5">跳转规则</b><input class="layui-input inline-block" name="rule[]" placeholder="请输入跳转规则" required style="width:240px" value="#"><a class="layui-btn layui-btn-primary" data-prefix="NEWS" data-rule-page="<?php echo url('data/news.item/select'); ?>">选择文章</a><a class="layui-btn layui-btn-primary" data-prefix="GOODS" data-rule-page="<?php echo url('data/shop.goods/select'); ?>">选择商品</a><span class="help-block block notselect">若要跳转页面，请选择对应的数据或填写跳转的 URL 地址，不跳转请填写 “#” 号占位。</span></label></div></div><label class="layui-hide"><textarea id="DefaultData"><?php echo htmlentities(json_encode((isset($data) && ($data !== '')?$data:[])),ENT_QUOTES); ?></textarea></label><style>
    [data-rule-page] {
        margin-top: -3px;
        margin-left: 5px;
    }

    [data-rule-item] {
        padding-left: 40px;
        margin-bottom: 20px;
    }

    [data-rule-item] .uploadimage {
        width: 135px;
        height: 100px;
    }

    [data-item-dn], [data-item-up], [data-item-rm] {
        margin-top: -4px;
        margin-left: 5px;
    }
</style><script>
    (function (data) {
        /*! 默认数据渲染 */
        if (data.length < 1) addItem();
        else data.forEach(function (item) {
            addItem(item)
        });
        /*! 初始化上传插件 */
        (function initUpload() {
            $('[data-rule-list] input[data-upload-image]').map(function () {
                if (!$(this).attr('inited')) $(this).attr('inited', true).uploadOneImage();
            });
            setTimeout(initUpload, 100);
        })();
        /*! 数据选项操作 */
        $('[data-rule-list]').on('click', '[data-rule-page]', function ($that) {
            $that = $(this), top.setItemValue = function (value) {
                $that.prevAll('input').val(($that.data('prefix') + '#{v}').replace('{v}', value));
            };
            $.form.iframe($(this).data('rule-page'), $that.data('title') || $that.text(), ['930px', '600px']);
        }).on('click', '[data-item-add]', function () {
            addItem();
        }).on('click', '[data-item-rm]', function () {
            $(this).parents('[data-rule-item]').remove();
        }).on('click', '[data-item-up]', function () {
            var item = $(this).parents('[data-rule-item]');
            var prev = item.prev('[data-rule-item]');
            if (item.index() > 0) item.insertBefore(prev);
        }).on('click', '[data-item-dn]', function () {
            var item = $(this).parents('[data-rule-item]');
            var next = item.next('[data-rule-item]');
            if (next) item.insertAfter(next);
        });
        /*! 表单提交处理 */
        $('form#DataForm').vali(function (ret) {
            var idx, data = [];
            for (idx in ret.img) {
                if (!ret.img[idx]) return $.msg.tips('请上传展示图片哦！');
                data.push({img: ret.img[idx], rule: ret.rule[idx], name: ret.name[idx]});
            }
            $.form.load('<?php echo htmlentities($request->url(),ENT_QUOTES); ?>', {data: JSON.stringify(data)}, 'post');
        });
    })(JSON.parse($('#DefaultData').val() || '[]') || []);

    /*! 添加数据选项 */
    function addItem(data) {
        this.$html = $($('[data-item-tpl]').html());
        if (data) for (this.index in data) this.$html.find('[name^="' + this.index + '"]').val(data[this.index]);
        $('[data-item-add]').parent().before(this.$html), setTimeout(function () {
            $.form.reInit();
        }, 100);
    }
</script></div></div></div>


<?php
    $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
    $image_background =
        $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

    $order_detail_status = App\Consts::ORDER_DETAIL_STATUS;
?>

<?php $__env->startSection('content'); ?>
    <section id="content">
        <div class="breadcrumb full-width">
            <div class="background-breadcrumb"></div>
            <div class="background">
                <div class="shadow"></div>
                <div class="pattern">
                    <div class="container">
                        <div class="clearfix">
                            <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                <li class="item"><a itemprop="url" title="Trang chủ"
                                        href="<?php echo e(route('frontend.home')); ?>"><span itemprop="title">Trang chủ</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(Auth::check()): ?>
            <div class="main-content full-width inner-page">
                <div class="background-content"></div>
                <div class="background">
                    <div class="shadow"></div>
                    <div class="pattern">
                        <div class="container">

                            <div class="container">
                                <h2>Danh sách đơn hàng</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày mua</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng đơn hàng</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($detail->orderDetails->count() > 1): ?>
                                                <tr>
                                                    <td rowspan="<?php echo e($detail->orderDetails->count()); ?>">#<?php echo e($detail->id); ?>

                                                    </td>
                                                    <td rowspan="<?php echo e($detail->orderDetails->count()); ?>">
                                                        <?php echo e($detail->order_date); ?></td>

                                                    <?php $__currentLoopData = $detail->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($key > 0): ?>
                                                            </tr><tr>
                                                        <?php endif; ?>
                                                        <td><?php echo e($item->product->title); ?></td>
                                                        <td><?php echo e($item->quantity); ?></td>
                                                        <td><?php echo e($item->price); ?></td>
                                                        <td><?php echo e($item->quantity * $item->price); ?></td>
                                                        <td>
                                                            <?php $__currentLoopData = $order_detail_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e(isset($item->status) && $item->status == $key ? $status : ''); ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                            <?php else: ?>
                                                <tr>
                                                    <td>#<?php echo e($detail->id); ?></td>
                                                    <td><?php echo e($detail->order_date); ?></td>
                                                    <td><?php echo e($detail->orderDetails->first()->product->title); ?></td>
                                                    <td><?php echo e($detail->orderDetails->first()->quantity); ?></td>
                                                    <td><?php echo e($detail->orderDetails->first()->price); ?></td>
                                                    <td><?php echo e($detail->orderDetails->first()->quantity * $detail->orderDetails->first()->price); ?>

                                                    </td>
                                                    <td>
                                                        <?php $__currentLoopData = $order_detail_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($detail->orderDetails->first()->status == $key ? $status : ''); ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="main-content full-width inner-page">
                <div class="background-content"></div>
                <div class="background">
                    <div class="shadow"></div>
                    <div class="pattern">
                        <div class="container">

                            <div class="container">
                                <h3 class="alert alert-warning" style="text-align: center">Vui lòng đăng nhập để xem chi tiết!
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<style>
    table {
        width: 100%;
    }

    th,
    td {
        text-align: center;
    }
</style>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SAVE\do_an\TopFashion\public_html\resources\views/frontend/pages/product/order_tracking.blade.php ENDPATH**/ ?>
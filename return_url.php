<?php
/* * 
 * 功能：彩虹易支付页面跳转同步通知页面
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 */

require_once("lib/epay.config.php");
require_once("lib/EpayCore.class.php");

// 计算得出通知验证结果
$epay = new EpayCore($epay_config);
$verify_result = $epay->verifyReturn();

// 获取支付信息
$out_trade_no = isset($_GET['out_trade_no']) ? $_GET['out_trade_no'] : '';
$trade_no = isset($_GET['trade_no']) ? $_GET['trade_no'] : '';
$trade_status = isset($_GET['trade_status']) ? $_GET['trade_status'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
$money = isset($_GET['money']) ? $_GET['money'] : '';

// 判断支付状态
$is_payment_success = $verify_result && $trade_status == 'TRADE_SUCCESS';
$is_payment_abnormal = $verify_result && $trade_status != 'TRADE_SUCCESS';
$is_verification_failed = !$verify_result;

// 根据支付状态设置页面标题
$page_title = "支付处理中";
if ($is_payment_success) {
    $page_title = "支付成功 - 感谢您的支持";
} elseif ($is_payment_abnormal) {
    $page_title = "支付状态异常";
} else {
    $page_title = "支付验证失败";
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $page_title; ?></title>
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome 图标 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            :root {
                /* 莫奈印象派色调 */
                --monet-blue: #7BAFD4;
                --monet-lavender: #C9B1D0;
                --monet-mint: #A8D5BA;
                --monet-peach: #F4C2B3;
                --monet-cream: #F8F4E9;
                --monet-lilac: #D4C5E0;
                --monet-sage: #B8C8B3;
                --monet-gold: #E6C79C;
                --monet-text: #5D576B;
                --monet-success: #6DA17A;
                --monet-warning: #D4A76A;
                --monet-danger: #D47A7A;
            }
            
            * {
                box-sizing: border-box;
            }
            
            body {
            background-image: url('https://rba.kanostar.top/adapt');
            backdrop-filter: blur(2.5px);  
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 15px;
                margin: 0;
                position: relative;
                overflow-x: hidden;
            }
            
            /* 添加浮动装饰元素 */
            body::before {
                content: "";
                position: absolute;
                top: 10%;
                left: 5%;
                width: 100px;
                height: 100px;
                background: rgba(123, 175, 212, 0.1);
                border-radius: 50%;
                animation: float 20s infinite linear;
            }
            
            body::after {
                content: "";
                position: absolute;
                bottom: 15%;
                right: 5%;
                width: 150px;
                height: 150px;
                background: rgba(201, 177, 208, 0.1);
                border-radius: 50%;
                animation: float 25s infinite linear reverse;
            }
            
            @keyframes float {
                0% { transform: translate(0, 0) rotate(0deg); }
                25% { transform: translate(10px, 15px) rotate(90deg); }
                50% { transform: translate(0, 30px) rotate(180deg); }
                75% { transform: translate(-10px, 15px) rotate(270deg); }
                100% { transform: translate(0, 0) rotate(360deg); }
            }
            
            .result-card {
                border-radius: 24px;
                box-shadow: 
                    0 15px 35px rgba(0, 0, 0, 0.1),
                    0 3px 10px rgba(0, 0, 0, 0.05);
                border: none;
                overflow: hidden;
                width: 100%;
                max-width: 500px;
                margin: 0 auto;
                backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.85);
                position: relative;
                z-index: 10;
            }
            
            .success-header {
                background: linear-gradient(135deg, var(--monet-success) 0%, #8BC34A 100%);
                color: white;
                padding: 2rem 1.5rem;
                text-align: center;
                position: relative;
                overflow: hidden;
            }
            
            .success-header::before {
                content: "";
                position: absolute;
                top: -50%;
                right: -20%;
                width: 200px;
                height: 200px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
            }
            
            .warning-header {
                background: linear-gradient(135deg, var(--monet-warning) 0%, #FFB74D 100%);
                color: white;
                padding: 2rem 1.5rem;
                text-align: center;
                position: relative;
                overflow: hidden;
            }
            
            .warning-header::before {
                content: "";
                position: absolute;
                top: -50%;
                right: -20%;
                width: 200px;
                height: 200px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
            }
            
            .danger-header {
                background: linear-gradient(135deg, var(--monet-danger) 0%, #E57373 100%);
                color: white;
                padding: 2rem 1.5rem;
                text-align: center;
                position: relative;
                overflow: hidden;
            }
            
            .danger-header::before {
                content: "";
                position: absolute;
                top: -50%;
                right: -20%;
                width: 200px;
                height: 200px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
            }
            
            .result-icon {
                font-size: 4.5rem;
                margin-bottom: 1rem;
                filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            }
            
            .result-body {
                padding: 2rem 1.5rem;
                background: white;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, var(--monet-blue) 0%, var(--monet-lavender) 100%);
                border: none;
                padding: 0.85rem 1.75rem;
                border-radius: 50px;
                font-weight: 600;
                width: 100%;
                margin-bottom: 0.75rem;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(123, 175, 212, 0.3);
            }
            
            .btn-primary:hover {
                transform: translateY(-3px);
                box-shadow: 0 7px 20px rgba(123, 175, 212, 0.4);
            }
            
            .btn-outline-secondary {
                border-radius: 50px;
                padding: 0.85rem 1.75rem;
                width: 100%;
                margin-bottom: 0.75rem;
                border: 2px solid var(--monet-text);
                color: var(--monet-text);
                font-weight: 600;
                transition: all 0.3s ease;
            }
            
            .btn-outline-secondary:hover {
                background-color: var(--monet-text);
                color: white;
                transform: translateY(-3px);
            }
            
            .order-info {
                background-color: rgba(248, 249, 250, 0.7);
                border-radius: 16px;
                padding: 1.25rem;
                margin: 1.5rem 0;
                border: 1px solid rgba(0, 0, 0, 0.05);
            }
            
            .benefit-list {
                text-align: left;
                margin-top: 1.5rem;
            }
            
            .benefit-item {
                display: flex;
                align-items: flex-start;
                margin-bottom: 1rem;
                padding: 0.75rem;
                border-radius: 12px;
                background: rgba(168, 213, 186, 0.1);
                transition: all 0.3s ease;
            }
            
            .benefit-item:hover {
                background: rgba(168, 213, 186, 0.2);
                transform: translateX(5px);
            }
            
            .benefit-icon {
                color: var(--monet-success);
                margin-right: 0.75rem;
                font-size: 1.25rem;
                margin-top: 0.15rem;
                flex-shrink: 0;
            }
            
            .benefit-text {
                flex: 1;
                font-weight: 500;
                color: var(--monet-text);
            }
            
            .payment-method {
                display: inline-flex;
                align-items: center;
                padding: 0.5rem 1rem;
                border-radius: 50px;
                background: rgba(123, 175, 212, 0.1);
                color: var(--monet-blue);
                font-weight: 600;
            }
            
            .payment-method i {
                margin-right: 0.5rem;
            }
            
            /* 手机端优化 */
            @media (max-width: 576px) {
                body {
                    padding: 10px;
                    align-items: flex-start;
                    padding-top: 20px;
                }
                
                .result-card {
                    border-radius: 20px;
                }
                
                .success-header, .warning-header, .danger-header {
                    padding: 1.5rem 1rem;
                }
                
                .result-icon {
                    font-size: 3.5rem;
                }
                
                .result-body {
                    padding: 1.5rem 1rem;
                }
                
                h2 {
                    font-size: 1.5rem;
                }
                
                h4 {
                    font-size: 1.25rem;
                }
                
                .btn-primary, .btn-outline-secondary {
                    padding: 0.85rem 1.5rem;
                    font-size: 1rem;
                }
                
                .order-info {
                    padding: 1rem;
                    margin: 1.25rem 0;
                }
            }
            
            /* 平板端优化 */
            @media (min-width: 577px) and (max-width: 768px) {
                .result-card {
                    max-width: 450px;
                }
            }
            
            /* 按钮容器响应式布局 */
            .button-container {
                display: flex;
                flex-direction: column;
                width: 100%;
            }
            
            @media (min-width: 577px) {
                .button-container {
                    flex-direction: row;
                    justify-content: center;
                }
                
                .btn-primary, .btn-outline-secondary {
                    width: auto;
                    margin-right: 0.75rem;
                    margin-bottom: 0;
                }
                
                .btn-primary:last-child, .btn-outline-secondary:last-child {
                    margin-right: 0;
                }
            }
            
            /* 动画效果 */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-fade-in-up {
                animation: fadeInUp 0.6s ease-out forwards;
            }
            
            .text-monet {
                color: var(--monet-text);
            }
        </style>
    </head>
    <body>
        <?php if ($is_payment_success): ?>
        <!-- 支付成功页面 -->
        <div class="result-card animate-fade-in-up">
            <div class="success-header">
                <div class="result-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2 class="mb-0">支付成功</h2>
            </div>
            
            <div class="result-body text-center">
                <h4 class="mb-3" style="color: var(--monet-success);">感谢您的支持！</h4>
                <p class="mb-4 text-monet">您的赞助将帮助我们持续创作更好的内容，我们衷心感谢您的慷慨支持。</p>
                
                <div class="order-info">
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">订单金额</small>
                            <div class="fw-bold fs-5" style="color: var(--monet-success);">¥<?php echo $money; ?></div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">支付方式</small>
                            <div class="mt-1">
                                <span class="payment-method">
                                    <?php 
                                    $paymentIcon = '';
                                    switch($type) {
                                        case 'alipay': 
                                            $paymentIcon = 'fab fa-alipay';
                                            break;
                                        case 'wxpay': 
                                            $paymentIcon = 'fab fa-weixin';
                                            break;
                                        case 'qqpay': 
                                            $paymentIcon = 'fab fa-qq';
                                            break;
                                        case 'bank': 
                                            $paymentIcon = 'fas fa-university';
                                            break;
                                        default: 
                                            $paymentIcon = 'fas fa-money-bill-wave';
                                    }
                                    ?>
                                    <i class="<?php echo $paymentIcon; ?>"></i>
                                    <?php 
                                    switch($type) {
                                        case 'alipay': echo '支付宝'; break;
                                        case 'wxpay': echo '微信支付'; break;
                                        case 'qqpay': echo 'QQ钱包'; break;
                                        case 'bank': echo '云闪付'; break;
                                        default: echo $type;
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="benefit-list">
                    <h6 class="text-start mb-3 text-monet">您的赞助将获得：</h6>
                    <div class="benefit-item">
                        <i class="fas fa-star benefit-icon"></i>
                        <div class="benefit-text">优先获取最新内容和更新</div>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-heart benefit-icon"></i>
                        <div class="benefit-text">在感谢名单中展示您的名字</div>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-gift benefit-icon"></i>
                        <div class="benefit-text">未来可能的专属福利和特权</div>
                    </div>
                </div>
                
                <div class="mt-4 button-container">
                    <a href="index.php" class="btn btn-primary">
                        <i class="fas fa-home me-1"></i> 返回首页
                    </a>
                    <button onclick="window.close()" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-1"></i> 关闭页面
                    </button>
                </div>
                
                <div class="mt-3">
                    <small class="text-muted">订单号: <?php echo $out_trade_no; ?></small>
                </div>
            </div>
        </div>

        <?php elseif ($is_payment_abnormal): ?>
        <!-- 支付状态异常页面 -->
        <div class="result-card animate-fade-in-up">
            <div class="warning-header">
                <div class="result-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h2 class="mb-0">支付状态异常</h2>
            </div>
            
            <div class="result-body text-center">
                <h4 class="mb-3" style="color: var(--monet-warning);">支付状态异常</h4>
                <p class="mb-4 text-monet">交易状态：<?php echo $trade_status; ?></p>
                <p class="mb-4 text-monet">如果您的账户已扣款但显示状态异常，请联系客服处理。</p>
                
                <div class="button-container">
                    <a href="index.php" class="btn btn-primary">返回首页</a>
                    <a href="#" class="btn btn-outline-secondary">联系客服</a>
                </div>
            </div>
        </div>

        <?php else: ?>
        <!-- 验证失败页面 -->
        <div class="result-card animate-fade-in-up">
            <div class="danger-header">
                <div class="result-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <h2 class="mb-0">验证失败</h2>
            </div>
            
            <div class="result-body text-center">
                <h4 class="mb-3" style="color: var(--monet-danger);">支付验证失败</h4>
                <p class="mb-4 text-monet">支付验证未通过，请检查支付信息或联系客服。</p>
                <p class="mb-4 text-monet">如果您的账户已扣款但显示验证失败，请保留支付凭证并联系客服。</p>
                
                <div class="button-container">
                    <a href="index.php" class="btn btn-primary">返回首页</a>
                    <a href="#" class="btn btn-outline-secondary">联系客服</a>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Bootstrap 5 JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
            // 页面加载后添加一些动画效果
            document.addEventListener('DOMContentLoaded', function() {
                const resultCard = document.querySelector('.result-card');
                
                // 确保动画只播放一次
                if (!sessionStorage.getItem('animationShown')) {
                    resultCard.style.opacity = '0';
                    resultCard.style.transform = 'translateY(30px)';
                    
                    // 淡入动画
                    setTimeout(() => {
                        resultCard.style.transition = 'all 0.6s ease';
                        resultCard.style.opacity = '1';
                        resultCard.style.transform = 'translateY(0)';
                    }, 100);
                    
                       sessionStorage.setItem('animationShown', 'true');
                }
                
                <?php if($is_payment_success): ?>
                // 支付成功时，5秒后自动跳转回首页（可选）
                setTimeout(function() {
                    // 如果需要自动跳转，取消下面的注释
                    // window.location.href = 'index.php';
                }, 5000);
                <?php endif; ?>
            });
        </script>
    </body>
</html>

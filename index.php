<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>支持作者 - 感谢您的赞助</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 图标 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #6c757d;
            --success-color: #1cc88a;
            --danger-color: #e74a3b;
        }
        
        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            padding-top: 20px;
        }
        
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 0.5rem 0.5rem 0 0 !important;
            padding: 1rem 1.5rem;
        }
        
        .amount-option {
            border: 2px solid #e3e6f0;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 0.5rem;
            transition: all 0.2s;
            cursor: pointer;
            text-align: center;
        }
        
        .amount-option:hover {
            border-color: var(--primary-color);
            background-color: rgba(78, 115, 223, 0.05);
        }
        
        .amount-option.selected {
            border-color: var(--primary-color);
            background-color: rgba(78, 115, 223, 0.1);
        }
        
        .custom-amount-input {
            border-radius: 0.5rem;
            padding: 0.75rem;
            font-size: 1.1rem;
            text-align: center;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: #3a5ccc;
            border-color: #3a5ccc;
        }
        
        .payment-option {
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .payment-option:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .payment-method-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .wechat-color {
            color: #07c160;
        }
        
        .alipay-color {
            color: #1677ff;
        }
        
        .qqpay-color {
            color: #12b7f5;
        }
        
        .bank-color {
            color: #ff6a00;
        }
        
        .sponsor-message {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-radius: 0.5rem;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .author-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- 作者信息和赞助消息 -->
                <div class="sponsor-message text-center">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img src="https://via.placeholder.com/100" alt="作者头像" class="author-avatar mb-3 mb-md-0">
                        </div>
                        <div class="col-md-9">
                            <h2 class="h4 mb-2">感谢您的支持！</h2>
                            <p class="mb-0">您的每一份赞助都是我持续创作的动力，让我能够投入更多时间开发优质内容。</p>
                        </div>
                    </div>
                </div>
                
                <!-- 赞助金额选择 -->
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">选择赞助金额</h6>
                    </div>
                    <div class="card-body">
                        <!-- 固定金额选项 -->
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <h6 class="font-weight-bold">选择固定金额</h6>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="amount-option text-center" data-amount="5">
                                    <div class="h5 mb-1">5元</div>
                                    <small class="text-muted">感谢支持</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="amount-option text-center" data-amount="10">
                                    <div class="h5 mb-1">10元</div>
                                    <small class="text-muted">非常感谢</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="amount-option text-center" data-amount="20">
                                    <div class="h5 mb-1">20元</div>
                                    <small class="text-muted">大力支持</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="amount-option text-center" data-amount="50">
                                    <div class="h5 mb-1">50元</div>
                                    <small class="text-muted">慷慨赞助</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- 自定义金额 -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="font-weight-bold mb-3">或输入自定义金额</h6>
                                <div class="input-group">
                                    <span class="input-group-text">¥</span>
                                    <input type="number" class="form-control custom-amount-input" id="customAmount" placeholder="输入金额" min="1" max="1000">
                                </div>
                            </div>
                        </div>
                        
                        <!-- 当前选中金额显示 -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info d-flex align-items-center" role="alert">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <span>当前选中金额：<strong id="selectedAmount">0</strong> 元</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 支付方式选择 -->
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">选择支付方式</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- 微信支付 -->
                            <div class="col-md-6 mb-3">
                                <div class="card payment-option h-100" data-payment-type="wxpay">
                                    <div class="card-body text-center">
                                        <i class="fab fa-weixin payment-method-icon wechat-color"></i>
                                        <h5 class="card-title">微信支付</h5>
                                        <p class="card-text text-muted">使用微信扫描二维码完成支付</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- 支付宝支付 -->
                            <div class="col-md-6 mb-3">
                                <div class="card payment-option h-100" data-payment-type="alipay">
                                    <div class="card-body text-center">
                                        <i class="fab fa-alipay payment-method-icon alipay-color"></i>
                                        <h5 class="card-title">支付宝支付</h5>
                                        <p class="card-text text-muted">使用支付宝扫描二维码完成支付</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- QQ钱包支付 -->
                            <div class="col-md-6 mb-3">
                                <div class="card payment-option h-100" data-payment-type="qqpay">
                                    <div class="card-body text-center">
                                        <i class="fab fa-qq payment-method-icon qqpay-color"></i>
                                        <h5 class="card-title">QQ钱包支付</h5>
                                        <p class="card-text text-muted">使用QQ钱包完成支付</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- 云闪付 -->
                            <div class="col-md-6 mb-3">
                                <div class="card payment-option h-100" data-payment-type="bank">
                                    <div class="card-body text-center">
                                        <i class="fas fa-university payment-method-icon bank-color"></i>
                                        <h5 class="card-title">云闪付</h5>
                                        <p class="card-text text-muted">使用云闪付完成支付</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- 支付按钮 -->
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button class="btn btn-primary btn-lg" id="payButton" disabled>
                                    <i class="fas fa-heart me-2"></i>立即赞助
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 支付表单（隐藏） -->
                <form id="payForm" action="epayapi.php" method="post" class="d-none">
                    <input type="hidden" name="type" id="payType">
                    <input type="hidden" name="WIDout_trade_no" id="outTradeNo">
                    <input type="hidden" name="WIDsubject" id="subject">
                    <input type="hidden" name="WIDtotal_fee" id="totalFee">
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // 当前选中的金额和支付方式
        let selectedAmount = 0;
        let selectedPaymentMethod = '';
        
        // 初始化页面
        document.addEventListener('DOMContentLoaded', function() {
            // 固定金额选项点击事件
            document.querySelectorAll('.amount-option').forEach(option => {
                option.addEventListener('click', function() {
                    // 移除其他选项的选中状态
                    document.querySelectorAll('.amount-option').forEach(el => {
                        el.classList.remove('selected');
                    });
                    
                    // 设置当前选项为选中状态
                    this.classList.add('selected');
                    
                    // 更新选中金额
                    selectedAmount = parseFloat(this.getAttribute('data-amount'));
                    document.getElementById('selectedAmount').textContent = selectedAmount;
                    
                    // 清空自定义金额输入
                    document.getElementById('customAmount').value = '';
                    
                    // 检查是否可以启用支付按钮
                    checkPaymentReady();
                });
            });
            
            // 自定义金额输入事件
            document.getElementById('customAmount').addEventListener('input', function() {
                const customAmount = parseFloat(this.value);
                
                if (!isNaN(customAmount) && customAmount > 0) {
                    // 移除固定金额的选中状态
                    document.querySelectorAll('.amount-option').forEach(el => {
                        el.classList.remove('selected');
                    });
                    
                    // 更新选中金额
                    selectedAmount = customAmount;
                    document.getElementById('selectedAmount').textContent = selectedAmount;
                    
                    // 检查是否可以启用支付按钮
                    checkPaymentReady();
                } else {
                    selectedAmount = 0;
                    document.getElementById('selectedAmount').textContent = selectedAmount;
                    document.getElementById('payButton').disabled = true;
                }
            });
            
            // 支付方式选择事件
            document.querySelectorAll('.payment-option').forEach(option => {
                option.addEventListener('click', function() {
                    // 移除其他选项的选中状态
                    document.querySelectorAll('.payment-option').forEach(el => {
                        el.style.border = '';
                    });
                    
                    // 设置当前选项为选中状态
                    this.style.border = '2px solid var(--primary-color)';
                    
                    // 更新选中支付方式
                    selectedPaymentMethod = this.getAttribute('data-payment-type');
                    
                    // 检查是否可以启用支付按钮
                    checkPaymentReady();
                });
            });
            
            // 支付按钮点击事件
            document.getElementById('payButton').addEventListener('click', function() {
                if (selectedAmount <= 0 || !selectedPaymentMethod) {
                    alert('请选择赞助金额和支付方式');
                    return;
                }
                
                // 生成订单号（实际应用中应由服务器生成）
                const outTradeNo = 'SP' + Date.now() + Math.floor(Math.random() * 1000);
                
                // 设置支付表单参数
                document.getElementById('payType').value = selectedPaymentMethod;
                document.getElementById('outTradeNo').value = outTradeNo;
                document.getElementById('subject').value = '赞助作者-' + selectedAmount + '元';
                document.getElementById('totalFee').value = selectedAmount;
                
                // 提交表单
                document.getElementById('payForm').submit();
            });
        });
        
        // 检查是否可以启用支付按钮
        function checkPaymentReady() {
            if (selectedAmount > 0 && selectedPaymentMethod) {
                document.getElementById('payButton').disabled = false;
            } else {
                document.getElementById('payButton').disabled = true;
            }
        }
    </script>
</body>
</html>
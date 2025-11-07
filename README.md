# 赞助作者页面 - 集成彩虹易支付

一个基于Bootstrap 5和彩虹易支付V1 SDK的现代化赞助页面。

![效果图1](https://youke1.picui.cn/s1/2025/11/07/690d6440d1ebf.png)
![效果图1](https://youke1.picui.cn/s1/2025/11/07/690d647c56e7b.png)

## 功能特点

- 🎨 基于Bootstrap 5的响应式设计
- 💰 支持固定金额和自定义金额
- 🔗 集成彩虹易支付V1协议
- 📱 支持微信、支付宝、QQ钱包、云闪付
- 🎯 支付成功自动弹窗感谢
- 📦 开箱即用，配置简单

## 安装使用

1. 克隆项目到您的服务器
2. 复制 `lib/epay.config.example.php` 为 `lib/epay.config.php`
3. 配置您的商户信息
4. 修改通知地址为您自己的域名
5. 访问 `index.php` 即可使用

## 配置说明

在 `lib/epay.config.php` 中配置：

```php
$epay_config['apiurl'] = '您的支付接口地址';
$epay_config['pid'] = '您的商户ID';
$epay_config['key'] = '您的商户密钥';

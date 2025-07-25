<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #INV-2024-001</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .invoice-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            position: relative;
        }

        .invoice-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .company-info h1 {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .company-info p {
            opacity: 0.9;
            margin-bottom: 3px;
        }

        .invoice-title {
            text-align: right;
        }

        .invoice-title h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .invoice-number {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-block;
            font-weight: bold;
        }

        .invoice-body {
            padding: 30px;
        }

        .invoice-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .bill-to, .invoice-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }

        .bill-to h3, .invoice-info h3 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 1.2em;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .bill-to p, .invoice-info p {
            margin-bottom: 8px;
            color: #555;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-table thead {
            background: #667eea;
            color: white;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .invoice-table th {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9em;
        }

        .invoice-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .invoice-table .text-right {
            text-align: right;
        }

        .invoice-table .text-center {
            text-align: center;
        }

        .item-description {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .totals-section {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
        }

        .totals-table {
            width: 300px;
            background: #f8f9fa;
            border-radius: 8px;
            overflow: hidden;
        }

        .totals-table tr {
            border-bottom: 1px solid #dee2e6;
        }

        .totals-table tr:last-child {
            border-bottom: none;
            background: #667eea;
            color: white;
            font-weight: bold;
            font-size: 1.1em;
        }

        .totals-table td {
            padding: 12px 20px;
        }

        .totals-table .label {
            text-align: left;
        }

        .totals-table .amount {
            text-align: right;
            font-weight: 500;
        }

        .invoice-notes {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .invoice-notes h4 {
            color: #856404;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .invoice-notes p {
            color: #856404;
            margin-bottom: 8px;
        }

        .payment-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .payment-methods, .terms {
            background: #e8f4fd;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #17a2b8;
        }

        .payment-methods h4, .terms h4 {
            color: #17a2b8;
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        .payment-methods ul {
            list-style: none;
        }

        .payment-methods li {
            padding: 5px 0;
            color: #555;
        }

        .payment-methods li::before {
            content: "✓";
            color: #28a745;
            font-weight: bold;
            margin-right: 10px;
        }

        .invoice-footer {
            background: #343a40;
            color: white;
            padding: 20px 30px;
            text-align: center;
        }

        .invoice-footer p {
            margin-bottom: 5px;
            opacity: 0.8;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-paid {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        .status-overdue {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #667eea;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }

        .print-button:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        @media print {
            body {
                background: white;
            }
            
            .invoice-container {
                box-shadow: none;
                margin: 0;
                border-radius: 0;
            }
            
            .print-button {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .invoice-container {
                margin: 10px;
                border-radius: 0;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .invoice-title {
                text-align: center;
            }

            .invoice-details {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .payment-info {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .invoice-table {
                font-size: 0.9em;
            }

            .invoice-table th,
            .invoice-table td {
                padding: 10px 8px;
            }

            .totals-table {
                width: 100%;
            }

            .print-button {
                position: static;
                width: 100%;
                margin: 10px;
                border-radius: 8px;
            }
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">🖨️ Print Invoice</button>
    
    <div class="invoice-container">
        <!-- Invoice Header -->
        <div class="invoice-header">
            <div class="header-content">
                <div class="company-info">
                    <h1>Your Company</h1>
                    <p>123 Business Street</p>
                    <p>City, State 12345</p>
                    <p>Phone: (555) 123-4567</p>
                    <p>Email: info@yourcompany.com</p>
                </div>
                <div class="invoice-title">
                    <h2>INVOICE</h2>
                    <div class="invoice-number">INV-2024-001</div>
                    <div style="margin-top: 15px;">
                        <span class="status-badge status-pending">Pending</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Body -->
        <div class="invoice-body">
            <!-- Invoice Details -->
            <div class="invoice-details">
                <div class="bill-to">
                    <h3>Bill To</h3>
                    <p><strong>John Doe</strong></p>
                    <p>ABC Corporation</p>
                    <p>456 Client Avenue</p>
                    <p>Client City, State 67890</p>
                    <p>Phone: (555) 987-6543</p>
                    <p>Email: john.doe@abccorp.com</p>
                </div>
                <div class="invoice-info">
                    <h3>Invoice Details</h3>
                    <p><strong>Invoice Number:</strong> INV-2024-001</p>
                    <p><strong>Invoice Date:</strong> January 15, 2024</p>
                    <p><strong>Due Date:</strong> February 15, 2024</p>
                    <p><strong>Payment Terms:</strong> Net 30</p>
                    <p><strong>Project:</strong> Website Development</p>
                </div>
            </div>

            <!-- Invoice Items Table -->
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th style="width: 50%;">Description</th>
                        <th class="text-center" style="width: 15%;">Qty</th>
                        <th class="text-right" style="width: 15%;">Rate</th>
                        <th class="text-right" style="width: 20%;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>Website Design & Development</strong>
                            <div class="item-description">Custom responsive website with modern design, including homepage, about page, services, and contact form</div>
                        </td>
                        <td class="text-center">1</td>
                        <td class="text-right">$2,500.00</td>
                        <td class="text-right">$2,500.00</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Content Management System</strong>
                            <div class="item-description">Custom CMS integration for easy content updates and blog management</div>
                        </td>
                        <td class="text-center">1</td>
                        <td class="text-right">$800.00</td>
                        <td class="text-right">$800.00</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>SEO Optimization</strong>
                            <div class="item-description">On-page SEO optimization, meta tags, and search engine friendly URLs</div>
                        </td>
                        <td class="text-center">1</td>
                        <td class="text-right">$400.00</td>
                        <td class="text-right">$400.00</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Mobile App Development</strong>
                            <div class="item-description">Native mobile application for iOS and Android platforms</div>
                        </td>
                        <td class="text-center">2</td>
                        <td class="text-right">$1,200.00</td>
                        <td class="text-right">$2,400.00</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Training & Documentation</strong>
                            <div class="item-description">User training sessions and comprehensive documentation</div>
                        </td>
                        <td class="text-center">4</td>
                        <td class="text-right">$150.00</td>
                        <td class="text-right">$600.00</td>
                    </tr>
                </tbody>
            </table>

            <!-- Totals Section -->
            <div class="totals-section">
                <table class="totals-table">
                    <tr>
                        <td class="label">Subtotal:</td>
                        <td class="amount">$6,700.00</td>
                    </tr>
                    <tr>
                        <td class="label">Discount (10%):</td>
                        <td class="amount">-$670.00</td>
                    </tr>
                    <tr>
                        <td class="label">Tax (8.5%):</td>
                        <td class="amount">$512.55</td>
                    </tr>
                    <tr>
                        <td class="label">Total Amount:</td>
                        <td class="amount">$6,542.55</td>
                    </tr>
                </table>
            </div>

            <!-- Invoice Notes -->
            <div class="invoice-notes">
                <h4>📝 Notes & Instructions</h4>
                <p><strong>Payment Instructions:</strong> Please make payment within 30 days of invoice date.</p>
                <p><strong>Late Fee:</strong> A 1.5% monthly service charge will be added to overdue accounts.</p>
                <p><strong>Project Timeline:</strong> Development will begin upon receipt of 50% deposit.</p>
            </div>

            <!-- Payment Information -->
            <div class="payment-info">
                <div class="payment-methods">
                    <h4>💳 Payment Methods</h4>
                    <ul>
                        <li>Bank Transfer (ACH)</li>
                        <li>Credit Card (Visa, MasterCard, Amex)</li>
                        <li>PayPal</li>
                        <li>Check (Made payable to: Your Company)</li>
                        <li>Wire Transfer</li>
                    </ul>
                </div>
                <div class="terms">
                    <h4>📋 Terms & Conditions</h4>
                    <p><strong>Payment Terms:</strong> Net 30 days</p>
                    <p><strong>Late Payment:</strong> 1.5% monthly charge</p>
                    <p><strong>Dispute Period:</strong> 10 days from invoice date</p>
                    <p><strong>Warranty:</strong> 90 days on all work performed</p>
                    <p><strong>Cancellation:</strong> 48 hours notice required</p>
                </div>
            </div>
        </div>

        <!-- Invoice Footer -->
        <div class="invoice-footer">
            <p><strong>Thank you for your business!</strong></p>
            <p>For questions about this invoice, please contact us at billing@yourcompany.com or (555) 123-4567</p>
            <p>Visit us online: www.yourcompany.com | Follow us on social media @yourcompany</p>
        </div>
    </div>
</body>
</html>
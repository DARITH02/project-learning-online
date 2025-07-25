<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Receipt</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            min-height: 100vh;
        }

        .receipt-container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }

        .receipt-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c);
        }

        .receipt-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .receipt-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-top: 20px solid #764ba2;
        }

        .institution-logo {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .institution-name {
            font-size: 2.2em;
            font-weight: bold;
            margin-bottom: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .institution-tagline {
            font-size: 1em;
            opacity: 0.9;
            margin-bottom: 10px;
        }

        .receipt-title {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 25px;
            display: inline-block;
            font-size: 1.3em;
            font-weight: bold;
            margin-top: 10px;
        }

        .receipt-meta {
            background: #f8f9fa;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #e9ecef;
        }

        .receipt-number {
            font-weight: bold;
            color: #667eea;
            font-size: 1.1em;
        }

        .receipt-date {
            color: #6c757d;
            font-weight: 500;
        }

        .status-badge {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .receipt-body {
            padding: 30px;
        }

        .student-info-section {
            margin-bottom: 30px;
        }

        .section-title {
            color: #667eea;
            font-size: 1.3em;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-icon {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            transition: transform 0.2s ease;
        }

        .info-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .info-label {
            font-size: 0.9em;
            color: #6c757d;
            font-weight: 500;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1.1em;
            color: #333;
            font-weight: 600;
        }

        .course-details {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        .course-title {
            font-size: 1.4em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .course-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .course-item {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 15px;
            border-radius: 8px;
            text-align: center;
        }

        .course-item-label {
            font-size: 0.8em;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .course-item-value {
            font-weight: bold;
            font-size: 1.1em;
        }

        .payment-section {
            background: #e8f5e8;
            border: 2px solid #28a745;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .payment-title {
            color: #28a745;
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .payment-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .payment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #c3e6cb;
        }

        .payment-item:last-child {
            border-bottom: none;
            font-weight: bold;
            font-size: 1.1em;
            color: #28a745;
        }

        .important-notes {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .notes-title {
            color: #856404;
            font-weight: bold;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .notes-list {
            list-style: none;
            color: #856404;
        }

        .notes-list li {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }

        .notes-list li::before {
            content: "⚠️";
            position: absolute;
            left: 0;
        }

        .receipt-footer {
            background: linear-gradient(135deg, #343a40 0%, #495057 100%);
            color: white;
            padding: 25px 30px;
            text-align: center;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 15px;
        }

        .footer-section h4 {
            margin-bottom: 8px;
            color: #f8f9fa;
        }

        .footer-section p {
            font-size: 0.9em;
            opacity: 0.8;
            margin-bottom: 3px;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px dashed #dee2e6;
        }

        .signature-box {
            text-align: center;
            flex: 1;
            margin: 0 20px;
        }

        .signature-line {
            border-bottom: 2px solid #dee2e6;
            height: 50px;
            margin-bottom: 10px;
        }

        .signature-label {
            font-weight: 500;
            color: #6c757d;
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .print-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            
            .receipt-container {
                box-shadow: none;
                margin: 0;
                border-radius: 0;
                max-width: none;
            }
            
            .print-button {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .receipt-container {
                margin: 10px;
                border-radius: 10px;
            }

            .receipt-meta {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .course-info {
                grid-template-columns: 1fr;
            }

            .payment-details {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .signature-section {
                flex-direction: column;
                gap: 30px;
            }

            .print-button {
                position: static;
                width: calc(100% - 20px);
                margin: 10px;
                border-radius: 10px;
            }
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">🖨️ Print Receipt</button>
    
    <div class="receipt-container">
        <!-- Receipt Header -->
        <div class="receipt-header">
            <div class="institution-logo">🎓</div>
            <h1 class="institution-name">Excellence University</h1>
            <p class="institution-tagline">Empowering Future Leaders</p>
            <div class="receipt-title">STUDENT REGISTRATION RECEIPT</div>
        </div>

        <!-- Receipt Meta Information -->
        <div class="receipt-meta">
            <div class="receipt-number">Receipt #: REG-2024-001234</div>
            <div class="receipt-date">Date: January 15, 2024</div>
            <div class="status-badge">✓ Confirmed</div>
        </div>

        <!-- Receipt Body -->
        <div class="receipt-body">
            <!-- Student Information -->
            <div class="student-info-section">
                <h3 class="section-title">
                    <span class="section-icon">👤</span>
                    Student Information
                </h3>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Full Name</div>
                        <div class="info-value">John Michael Smith</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email Address</div>
                        <div class="info-value">john.smith@email.com</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Phone Number</div>
                        <div class="info-value">+1 (555) 123-4567</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Student ID</div>
                        <div class="info-value">STU-2024-5678</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Date of Birth</div>
                        <div class="info-value">March 15, 2000</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Address</div>
                        <div class="info-value">123 Main Street, City, State 12345</div>
                    </div>
                </div>
            </div>

            <!-- Course Information -->
            <div class="course-details">
                <h3 class="course-title">📚 Course Registration Details</h3>
                <div class="info-item" style="background: rgba(255,255,255,0.2); border-left: none; margin-bottom: 15px;">
                    <div class="info-label" style="color: rgba(255,255,255,0.8);">Course Name</div>
                    <div class="info-value" style="color: white; font-size: 1.3em;">Bachelor of Computer Science</div>
                </div>
                <div class="course-info">
                    <div class="course-item">
                        <div class="course-item-label">Program Duration</div>
                        <div class="course-item-value">4 Years</div>
                    </div>
                    <div class="course-item">
                        <div class="course-item-label">Semester</div>
                        <div class="course-item-value">Spring 2024</div>
                    </div>
                    <div class="course-item">
                        <div class="course-item-label">Start Date</div>
                        <div class="course-item-value">February 1, 2024</div>
                    </div>
                    <div class="course-item">
                        <div class="course-item-label">Campus</div>
                        <div class="course-item-value">Main Campus</div>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="payment-section">
                <h3 class="payment-title">
                    💳 Payment Details
                </h3>
                <div class="payment-details">
                    <div>
                        <div class="payment-item">
                            <span>Registration Fee:</span>
                            <span>$500.00</span>
                        </div>
                        <div class="payment-item">
                            <span>Tuition Fee (Semester):</span>
                            <span>$8,500.00</span>
                        </div>
                        <div class="payment-item">
                            <span>Lab Fee:</span>
                            <span>$300.00</span>
                        </div>
                        <div class="payment-item">
                            <span>Library Fee:</span>
                            <span>$150.00</span>
                        </div>
                        <div class="payment-item">
                            <span>Student Activities Fee:</span>
                            <span>$100.00</span>
                        </div>
                        <div class="payment-item">
                            <span><strong>Total Amount Paid:</strong></span>
                            <span><strong>$9,550.00</strong></span>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #c3e6cb;">
                    <p><strong>Payment Method:</strong> Credit Card (**** **** **** 1234)</p>
                    <p><strong>Transaction ID:</strong> TXN-789456123</p>
                    <p><strong>Payment Date:</strong> January 15, 2024 at 2:30 PM</p>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="important-notes">
                <h4 class="notes-title">📋 Important Information</h4>
                <ul class="notes-list">
                    <li>Please keep this receipt for your records</li>
                    <li>Student ID card will be issued within 5-7 business days</li>
                    <li>Orientation session is mandatory on January 25, 2024</li>
                    <li>Course materials list will be emailed before semester start</li>
                    <li>Refund policy: Full refund available until January 20, 2024</li>
                    <li>For any queries, contact Student Services at (555) 987-6543</li>
                </ul>
            </div>

            <!-- Signature Section -->
            <div class="signature-section">
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-label">Student Signature</div>
                </div>
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-label">Registrar Signature</div>
                </div>
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-label">Date</div>
                </div>
            </div>
        </div>

        <!-- Receipt Footer -->
        <div class="receipt-footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>📍 Campus Address</h4>
                    <p>123 University Avenue</p>
                    <p>Education City, State 12345</p>
                    <p>United States</p>
                </div>
                <div class="footer-section">
                    <h4>📞 Contact Information</h4>
                    <p>Phone: (555) 123-4567</p>
                    <p>Email: admissions@excellence.edu</p>
                    <p>Website: www.excellence.edu</p>
                </div>
                <div class="footer-section">
                    <h4>🕒 Office Hours</h4>
                    <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                    <p>Saturday: 9:00 AM - 2:00 PM</p>
                    <p>Sunday: Closed</p>
                </div>
            </div>
            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.2);">
                <p><strong>Thank you for choosing Excellence University!</strong></p>
                <p>We look forward to supporting your academic journey.</p>
            </div>
        </div>
    </div>
</body>
</html>
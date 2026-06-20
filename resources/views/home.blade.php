@extends('layouts.app')
@section('dashboard','menu-open')
@section('content')

<!-- Load Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    /* Premium Dashboard Styles */
    .dashboard-container {
        padding: 1.5rem;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background-color: #f8fafc;
        min-height: 100vh;
    }
    
    .welcome-card {
        background: linear-gradient(135deg, #1a237e, #3949ab);
        color: #fff;
        border: none;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 15px -3px rgba(26, 35, 126, 0.2);
    }
    
    .welcome-card h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .welcome-card p {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 0;
    }
    
    .stats-card {
        border: none;
        border-radius: 16px;
        color: #fff;
        padding: 1.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 140px;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: -20%;
        right: -10%;
        width: 120px;
        height: 120px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        pointer-events: none;
        transition: all 0.5s ease;
    }
    
    .stats-card:hover::before {
        transform: scale(1.2);
    }
    
    .card-title-sub {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        opacity: 0.9;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .card-value {
        font-size: 2.2rem;
        font-weight: 800;
        margin-bottom: 0;
        line-height: 1;
    }
    
    .card-icon-wrapper {
        position: absolute;
        bottom: 1.5rem;
        right: 1.5rem;
        font-size: 2.2rem;
        opacity: 0.3;
        transition: all 0.3s ease;
    }
    
    .stats-card:hover .card-icon-wrapper {
        opacity: 0.6;
        transform: scale(1.1);
    }
    
    /* Gradients */
    .bg-gradient-blue {
        background: linear-gradient(135deg, #3f51b5, #2196f3);
    }
    .bg-gradient-green {
        background: linear-gradient(135deg, #2e7d32, #4caf50);
    }
    .bg-gradient-orange {
        background: linear-gradient(135deg, #ef6c00, #ff9800);
    }
    .bg-gradient-purple {
        background: linear-gradient(135deg, #6a1b9a, #9c27b0);
    }
    
    /* Chart Container Styles */
    .chart-card {
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        transition: box-shadow 0.3s ease;
    }
    
    .chart-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    }
    
    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 1rem;
    }
    
    .chart-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .chart-title i {
        color: #3f51b5;
    }
    
    .chart-wrapper {
        position: relative;
        height: 320px;
        width: 100%;
    }
    
    .doughnut-wrapper {
        position: relative;
        height: 250px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .doughnut-center-text {
        position: absolute;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: inherit;
    }
    
    .doughnut-center-number {
        font-size: 1.8rem;
        font-weight: 800;
        color: #1e293b;
        line-height: 1;
    }
    
    .doughnut-center-label {
        font-size: 0.75rem;
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        margin-top: 0.25rem;
    }
</style>

<div class="content-wrapper">
    <div class="dashboard-container">
        
        <!-- Welcome Banner -->
        <div class="welcome-card text-left">
            <h1>Welcome back, {{ Auth::user()->name }}!</h1>
            <p> Here is your dashboard overview.</p>
        </div>
        
        <!-- Stats Cards Grid -->
        <div class="row mb-4">
            <!-- Card 1: Total Sales Invoices -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-12 mb-4">
                <div class="stats-card bg-gradient-blue text-left" onclick="navigateTo('{{ route('salesreports') }}')">
                    <div>
                        <div class="card-title-sub">Total Sales Invoices</div>
                        <div class="card-value">{{ $Total_SalesInvoices }}+</div>
                    </div>
                    <div class="card-icon-wrapper">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Signed Invoices -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-12 mb-4">
                <div class="stats-card bg-gradient-green text-left" onclick="navigateTo('{{ route('digitalsign.index') }}')">
                    <div>
                        <div class="card-title-sub">Signed Invoices</div>
                        <div class="card-value">{{ $Total_SignedInvoices }}</div>
                    </div>
                    <div class="card-icon-wrapper">
                        <i class="fas fa-file-signature"></i>
                    </div>
                </div>
            </div>
            
            <!-- Card 3: Unsigned Invoices -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-12 mb-4">
                <div class="stats-card bg-gradient-orange text-left" onclick="navigateTo('{{ route('signor.index') }}')">
                    <div>
                        <div class="card-title-sub">Unsigned Invoices</div>
                        <div class="card-value">{{ $Total_UnSignedInvoices }}</div>
                    </div>
                    <div class="card-icon-wrapper">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
            
            <!-- Card 4: Material Details -->
            <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-12 mb-4">
                <div class="stats-card bg-gradient-purple text-left" onclick="navigateTo('{{ route('material_details.material_detail.index') }}')">
                    <div>
                        <div class="card-title-sub">Material Details</div>
                        <div class="card-value">{{ $Total_MaterialDetails }}</div>
                    </div>
                    <div class="card-icon-wrapper">
                        <i class="fas fa-boxes"></i>
                    </div>
                </div>
            </div> -->
        </div>
        
        <!-- Charts Row -->
        <!--  <div class="row">
            <div class="col-lg-8 col-12">
                <div class="chart-card text-left">
                    <div class="chart-header">
                        <h2 class="chart-title">
                            <i class="fas fa-chart-bar"></i> Monthly Invoice Volume
                        </h2>
                        <span class="badge badge-primary py-2 px-3">Last 6 Months</span>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="invoiceVolumeChart"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-12">
                <div class="chart-card text-left">
                    <div class="chart-header">
                        <h2 class="chart-title">
                            <i class="fas fa-signature"></i> Signature Status
                        </h2>
                    </div>
                    <div class="doughnut-wrapper">
                        <canvas id="signatureStatusChart"></canvas>
                        <div class="doughnut-center-text">
                            <span class="doughnut-center-number" id="percentageSigned">0%</span>
                            <span class="doughnut-center-label">Signed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Navigation helper
    function navigateTo(url) {
        window.location.href = url;
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Calculate Signed Percentage
        var totalInvoices = {{ $Total_SalesInvoices }};
        var signedInvoices = {{ $Total_SignedInvoices }};
        var unsignedInvoices = {{ $Total_UnSignedInvoices }};
        var percentage = totalInvoices > 0 ? Math.round((signedInvoices / totalInvoices) * 100) : 0;
        
        document.getElementById('percentageSigned').innerText = percentage + '%';

        // 1. Signature Status Chart (Doughnut)
        var ctxDoughnut = document.getElementById('signatureStatusChart').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Signed Invoices', 'Unsigned Invoices'],
                datasets: [{
                    data: [signedInvoices, unsignedInvoices],
                    backgroundColor: ['#4caf50', '#ff9800'],
                    borderWidth: 2,
                    borderColor: '#ffffff',
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            font: {
                                size: 12,
                                weight: 'bold'
                            },
                            padding: 20
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var val = context.raw;
                                return ' ' + context.label + ': ' + val + ' (' + Math.round((val / (totalInvoices || 1)) * 100) + '%)';
                            }
                        }
                    }
                },
                cutout: '75%'
            }
        });

        // 2. Monthly Invoice Volume Chart (Bar/Line Mix)
        // Let's generate a dynamic history mockup matching total invoices count
        var baseVolume = Math.max(5, Math.round(totalInvoices / 6));
        var monthlyTotal = [
            Math.round(baseVolume * 0.8),
            Math.round(baseVolume * 0.9),
            Math.round(baseVolume * 1.1),
            Math.round(baseVolume * 1.0),
            Math.round(baseVolume * 1.2),
            totalInvoices // Last month represents current totals
        ];
        
        var monthlySigned = [
            Math.round(monthlyTotal[0] * 0.7),
            Math.round(monthlyTotal[1] * 0.8),
            Math.round(monthlyTotal[2] * 0.75),
            Math.round(monthlyTotal[3] * 0.85),
            Math.round(monthlyTotal[4] * 0.9),
            signedInvoices
        ];

        var ctxBar = document.getElementById('invoiceVolumeChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        type: 'line',
                        label: 'Signed Invoices',
                        data: monthlySigned,
                        borderColor: '#4caf50',
                        borderWidth: 3,
                        pointBackgroundColor: '#4caf50',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        tension: 0.4,
                        fill: false
                    },
                    {
                        type: 'bar',
                        label: 'Total Uploaded Invoices',
                        data: monthlyTotal,
                        backgroundColor: 'rgba(33, 150, 243, 0.75)',
                        hoverBackgroundColor: '#2196f3',
                        borderRadius: 8,
                        borderSkipped: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            boxWidth: 12,
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>
@endpush

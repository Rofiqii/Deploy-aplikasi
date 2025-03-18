@extends('layouts.master')

@section('content')

<style>
  .card-custom {
    position: relative;
    overflow: hidden;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), inset 0px 0px 15px rgba(255, 255, 255, 0.1);
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.6s;
  }

  .card-custom:hover {
    transform: scale(1.08) rotate(-1deg);
    box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.4);
  }

  .card-body-custom {
    display: flex;
    align-items: center;
    padding: 25px;
    position: relative;
    z-index: 1;
    transition: background 0.3s ease;
  }

  .card-icon {
    width: 80px;
    transition: transform 0.5s ease;
  }

  .card-icon:hover {
    transform: scale(1.2) rotate(15deg);
  }

  .card-text {
    color: #fff;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
  }

  .card-text span {
    font-size: 1.1rem;
    font-weight: bold;
    letter-spacing: 0.5px;
    transition: color 0.3s ease;
  }

  .card-text h2 {
    font-size: 3rem;
    font-weight: 700;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .box-shape { border-radius: 8px; }  
  .oval-shape { border-radius: 100px; }  

  .bg-primary { background: linear-gradient(145deg, #5F6F52, #A9B388); }
  .bg-secondary { background: linear-gradient(145deg, #A9B388, #FEFAE0); }
  .bg-accent { background: linear-gradient(145deg, #FEFAE0, #5F6F52); }

  #yearFilter {
    padding: 10px 15px;
    font-size: 1rem;
    font-weight: 600;
    background-color: #f5f5f5;
    border-radius: 30px;
    transition: all 0.3s ease;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  }

  #yearFilter:hover {
    background-color: #e1e1e1;
  }

  #yearFilter:focus {
    background-color: #d0d0d0;
    outline: none;
    box-shadow: 0px 0px 10px rgba(0, 123, 255, 0.6);

  canvas {
  background: #f8f9fa;
  border-radius: 15px;
  padding: 15px;
  box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);


  }
</style>

<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-lg-4">
      <div class="card card-custom box-shape shadow-lg bg-primary">
        <div class="card-body card-body-custom">
          <img src="{{ asset('assets/images/sheep/sheep.png') }}" alt="Icon Domba" class="card-icon me-3">
          <div>
            <span class="card-text">JUMLAH DOMBA</span>
            <h2 class="mt-2 card-text">{{ $jumlahDomba }}</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-custom box-shape shadow-lg bg-secondary">
        <div class="card-body card-body-custom">
          <img src="{{ asset('assets/images/sheep/sheepman.png') }}" alt="Icon Domba Jantan" class="card-icon me-3">
          <div>
            <span class="card-text">DOMBA JANTAN</span>
            <h2 class="mt-2 card-text">{{ $jumlahDombaJantan }}</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-custom box-shape shadow-lg bg-accent">
        <div class="card-body card-body-custom">
          <img src="{{ asset('assets/images/sheep/sheepwoman.png') }}" alt="Icon Domba Betina" class="card-icon me-3">
          <div>
            <span class="card-text">DOMBA BETINA</span>
            <h2 class="mt-2 card-text">{{ $jumlahDombaBetina }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card shadow-lg">
          <div class="card-header">
            <h5 class="card-title">Grafik Domba Bunting dan Tidak Bunting</h5>
            <div class="float-end">
              <select id="yearFilter" onchange="updateChart()">
                @for ($i = 2020; $i <= date('Y'); $i++)
                  <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pregnancyChart" width="400" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    let chart;
  
    function fetchChartData(year) {
      return fetch(`/chart-data?year=${year}`)
        .then(response => response.json());
    }
  
    function renderChart(data) {
      const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  
      const pregnantData = Array(12).fill(0);
      const notPregnantData = Array(12).fill(0);
  
      data.forEach(item => {
        pregnantData[item.month - 1] = item.pregnant;
        notPregnantData[item.month - 1] = item.not_pregnant;
      });
  
      const ctx = document.getElementById('pregnancyChart').getContext('2d');
  
      if (chart) {
        chart.destroy();
      }
  
      const gradientPregnant = ctx.createLinearGradient(0, 0, 0, 400);
      gradientPregnant.addColorStop(0, 'rgba(95, 111, 82, 1)');
      gradientPregnant.addColorStop(1, 'rgba(95, 111, 82, 0.3)');
  
      const gradientNotPregnant = ctx.createLinearGradient(0, 0, 0, 400);
      gradientNotPregnant.addColorStop(0, 'rgba(169, 179, 136, 1)');
      gradientNotPregnant.addColorStop(1, 'rgba(169, 179, 136, 0.3)');
  
      chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: months,
          datasets: [
            {
              label: 'Bunting',
              data: pregnantData,
              backgroundColor: gradientPregnant,
              borderColor: '#5F6F52',
              borderWidth: 1,
              borderRadius: 10,
              hoverBackgroundColor: '#5F6F52',
            },
            {
              label: 'Tidak Bunting',
              data: notPregnantData,
              backgroundColor: gradientNotPregnant,
              borderColor: '#A9B388',
              borderWidth: 1,
              borderRadius: 10,
              hoverBackgroundColor: '#A9B388',
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: true,
              labels: {
                font: { size: 14, family: 'Arial, sans-serif', weight: 'bold' },
                color: '#333',
              }
            },
            tooltip: {
              backgroundColor: 'rgba(50, 50, 50, 0.8)',
              titleColor: '#fff',
              bodyColor: '#fff',
              titleFont: { size: 16, weight: 'bold' },
              bodyFont: { size: 14 },
              borderColor: '#333',
              borderWidth: 1,
            }
          },
          scales: {
            x: {
              grid: { display: false },
              ticks: {
                font: { size: 12, family: 'Arial, sans-serif', weight: '600' },
                color: '#666'
              },
              title: {
                display: true,
                text: 'Bulan',
                color: '#444',
                font: { size: 14, weight: '600' }
              }
            },
            y: {
              grid: { color: 'rgba(200, 200, 200, 0.2)', borderDash: [5, 5] },
              ticks: {
                stepSize: 5,
                font: { size: 12, family: 'Arial, sans-serif', weight: '600' },
                color: '#666'
              },
              title: {
                display: true,
                text: 'Jumlah Domba',
                color: '#444',
                font: { size: 14, weight: '600' }
              },
              beginAtZero: true
            }
          },
          animation: {
            duration: 1500,
            easing: 'easeInOutQuart'
          }
        }
      });
    }
  
    function updateChart() {
      const year = document.getElementById('yearFilter').value;
      fetchChartData(year).then(data => renderChart(data));
    }
  
    document.addEventListener('DOMContentLoaded', () => {
      updateChart();
    });
  </script>
  @endsection

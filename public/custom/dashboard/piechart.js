// const { add } = require("lodash");

// Load the Visualization API and the corechart package.
google.charts.load("current", { packages: ["corechart"] });

// Set up the chart
google.charts.setOnLoadCallback(drawHarvestByMonth);
google.charts.setOnLoadCallback(drawHarvestByYear);

google.charts.setOnLoadCallback(drawHarvestContribution);
google.charts.setOnLoadCallback(drawStockContribution);

google.charts.setOnLoadCallback(drawHarvestByBuilding);
google.charts.setOnLoadCallback(drawStockByBuilding);

function drawHarvestByMonth() {
    // Send AJAX request to update the chart
    $.ajax({
        url: "/outputPerMonth",
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            // Update the data for the chart
            //   data.removeRows(0, data.getNumberOfRows());
            // console.log(response);
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Month");
            data.addColumn("number", "Total Eggs");

            // Set chart options
            var options = {
                title: "Total Harvests Per Month",
                width: 550,
                height: 500,
            };

            $.each(response, function (index, item) {
                data.addRow([item.month, parseInt(item.total_amount)]);
            });

            // Instantiate and draw the chart for Anthony's pizza.
            var chart = new google.visualization.ColumnChart(
                document.getElementById("harvest_per_month_chart_div")
            );
            // Redraw the chart
            chart.draw(data, options);
        },
        error: function () {
            alert("Error fetching sales data");
        },
    });
}

function drawHarvestByYear() {
    // Send AJAX request to update the chart
    $.ajax({
        url: "/outputPerYear",
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            // Update the data for the chart
            //   data.removeRows(0, data.getNumberOfRows());
            // console.log(response);
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Year");
            data.addColumn("number", "Total Eggs");

            // Set chart options
            var options = {
                title: "Total Harvests Per Year",
                width: 550,
                height: 500,
            };

            $.each(response, function (index, item) {
                data.addRow([
                    item.year.toString(),
                    parseInt(item.total_amount),
                ]);
            });

            // Instantiate and draw the chart for Anthony's pizza.
            var chart = new google.visualization.ColumnChart(
                document.getElementById("harvest_per_year_chart_div")
            );
            // Redraw the chart
            chart.draw(data, options);
        },
        error: function () {
            alert("Error fetching sales data");
        },
    });
}
function drawHarvestByBuilding() {
    // Send AJAX request to update the chart
    $.ajax({
        url: "/productByBuilding",
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {

            console.log(response);
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Building");
            $.each(response.products, function(index, item) {
              data.addColumn("number", item.product_code);
            });
  
            $.each(response.data, function(index, item) {
              // console.log(Object.values(item));
              data.addRow(Object.values(item))
            });
            var options = {
                title: "Total Harvests of Each Product by Building",
                width: 1265,
                height: 500,
                chartArea: { width: "50%" },
                isStacked: true,
                hAxis: {
                    title: "Building",
                    minValue: 0,
                },
                vAxis: {
                    title: "Harvested Amount",
                },
                // series: {
                //     0: { color: "#3366CC" },
                //     1: { color: "#DC3912" },
                //     2: { color: "#FF9900" },
                // },
            };
            // Instantiate and draw the chart for Anthony's pizza.
            var chart = new google.visualization.ColumnChart(
                document.getElementById("harvest_per_building_chart_div")
            );
            // Redraw the chart
            chart.draw(data, options);
        },
        error: function () {
            alert("Error fetching sales data");
        },
    });
}
function drawStockByBuilding() {
  // Send AJAX request to update the chart
  $.ajax({
      url: "/stockPerBuilding",
      type: "POST",
      contentType: false,
      cache: false,
      processData: false,
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (response) {

          console.log(response);
          var data = new google.visualization.DataTable();
          data.addColumn("string", "Building");
          $.each(response.products, function(index, item) {
            data.addColumn("number", item.product_code);
          });

          $.each(response.data, function(index, item) {
            // console.log(Object.values(item));
            data.addRow(Object.values(item))
          });
          var options = {
              title: "Total Stock of Each Product by Building",
              width: 1265,
              height: 500,
              chartArea: { width: "50%" },
              isStacked: true,
              hAxis: {
                  title: "Building",
                  minValue: 0,
              },
              vAxis: {
                  title: "SKU Amount",
              },
              // series: {
              //     0: { color: "#3366CC" },
              //     1: { color: "#DC3912" },
              //     2: { color: "#FF9900" },
              // },
          };
          // Instantiate and draw the chart for Anthony's pizza.
          var chart = new google.visualization.ColumnChart(
              document.getElementById("stock_per_building_chart_div")
          );
          // Redraw the chart
          chart.draw(data, options);
      },
      error: function () {
          alert("Error fetching sales data");
      },
  });
}

function drawHarvestContribution() {
  // Send AJAX request to update the chart
  $.ajax({
      url: "/buildingHarvestContribution",
      type: "POST",
      contentType: false,
      cache: false,
      processData: false,
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (response) {
          // Update the data for the chart
          //   data.removeRows(0, data.getNumberOfRows());
          // console.log(response);
          var data = new google.visualization.DataTable();
          data.addColumn("string", "Building");
          data.addColumn("number", "Total Eggs");

          // Set chart options
          var options = {
              title: "Building Harvest Contribution",
              width: 550,
              height: 500,
              is3D: true,
          };

          $.each(response, function (index, item) {
              data.addRow([item.building_name, parseInt(item.total_amount)]);
          });

          // Instantiate and draw the chart for Anthony's pizza.
          var chart = new google.visualization.PieChart(
              document.getElementById("harvest_contribution_chart_div")
          );
          // Redraw the chart
          chart.draw(data, options);
      },
      error: function () {
          console.log(response);
          alert("Error fetching sales data");
      },
  });
}

function drawStockContribution() {
  // Send AJAX request to update the chart
  $.ajax({
      url: "/buildingStockContribution",
      type: "POST",
      contentType: false,
      cache: false,
      processData: false,
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (response) {
          // Update the data for the chart
          //   data.removeRows(0, data.getNumberOfRows());
          // console.log(response);
          var data = new google.visualization.DataTable();
          data.addColumn("string", "Building");
          data.addColumn("number", "Total Stock");

          // Set chart options
          var options = {
              title: "Building Stock Contribution",
              width: 550,
              height: 500,
              is3D: true,
          };

          $.each(response, function (index, item) {
              data.addRow([item.building_name, parseInt(item.total_amount)]);
          });

          // Instantiate and draw the chart for Anthony's pizza.
          var chart = new google.visualization.PieChart(
              document.getElementById("stock_contribution_chart_div")
          );
          // Redraw the chart
          chart.draw(data, options);
      },
      error: function () {
          alert("Error fetching sales data");
      },
  });
}


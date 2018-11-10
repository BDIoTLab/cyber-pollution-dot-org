/* Tables */
/* -------------------------------------------------- */
/*  Default tables */
table, th, td {
  border: 1px solid rgba(0, 0, 0, 0.1);
}
table {
  border-collapse: separate;
  border-spacing: 0;
  border-width: 2px 0 0 2px;
  width: 100%;
}
table td, table th {
  border-width: 0 2px 2px 0;
  padding: 7px 10px;
}

/* Baseline styles */
.fw-table table {
  width: 100%;
  max-width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  background-color: #fff;
  color: #000;
}
.fw-table table table {
  background-color: <?php echo esc_js($the_core_less_variables['body-bg']); ?>;
}
.fw-table table caption {
  padding-top: 10px;
  padding-bottom: 10px;
  color: #bfbfbf;
  text-align: left;
}
.fw-table table th {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: 14px;
  text-align: left;
}
/* Cells */
.fw-table table > thead > tr > th,
.fw-table table > tbody > tr > th,
.fw-table table > tfoot > tr > th,
.fw-table table > thead > tr > td,
.fw-table table > tbody > tr > td,
.fw-table table > tfoot > tr > td {
  padding: 8px 10px;
  vertical-align: top;
}
/* Bottom align for column headings */
.fw-table table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd;
  font-weight: normal;
}
/* Account for multiple tbody instances */
.fw-table table > tbody + tbody {
  border-top: 1px solid #ddd;
}
/* Condensed table w/ half padding */
.fw-table-condensed table > thead > tr > th,
.fw-table-condensed table > tbody > tr > th,
.fw-table-condensed table > tfoot > tr > th,
.fw-table-condensed table > thead > tr > td,
.fw-table-condensed table > tbody > tr > td,
.fw-table-condensed table > tfoot > tr > td {
  padding: 5px;
}

/* Bordered version */
/* Add borders all around the table and between all the columns. */
.fw-table-bordered table {
  border: none;
}
.fw-table-bordered table > thead > tr > th,
.fw-table-bordered table > tbody > tr > th,
.fw-table-bordered table > tfoot > tr > th,
.fw-table-bordered table > thead > tr > td,
.fw-table-bordered table > tbody > tr > td,
.fw-table-bordered table > tfoot > tr > td {
  border: 1px solid #ddd;
}

/* Zebra-striping */
/* Default zebra-stripe styles (alternating gray and transparent backgrounds) */
.fw-table-striped table > tbody > tr:nth-child(odd) {
  background-color: #f9f9f9;
}

/* Hover effect */
/* Placed here since it has to come after the potential zebra striping */
.fw-table-hover table > tbody > tr:hover {
  background-color: #f5f5f5;
}

/* Table cell sizing */
/* Reset default table behavior */
table col[class*="col-"] {
  position: static;
  float: none;
  display: table-column;
}
table td[class*="col-"],
table th[class*="col-"] {
  position: static;
  float: none;
  display: table-cell;
}


/* Responsive tables */
.fw-table {
  overflow-x: auto;
  overflow-y: hidden;
  min-height: 0.01%;
}
.fw-table .table-col-desc {
  color: #4d4d4d;
  text-align: right;
}
.fw-table .heading-row .table-col-desc {
  background-color: #ddd;
  color: #000;
}
.fw-table .heading-row th {
  background-color: #000;
  color: #fff;
}

/*----> Responsive <---- */
/* Screen 568px */
@media screen and (max-width: 767px) {
  .fw-table {
    width: 100%;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #ddd;
    margin-bottom: <?php echo floatval($the_core_less_variables['line-height-computed'])*0.75; ?>px;
  }
  /* Tighten up spacing */
  .fw-table > table {
    margin-bottom: 0;
  }
  /* Ensure the content doesn't wrap */
  .fw-table > table > thead > tr > th,
  .fw-table > table > tbody > tr > th,
  .fw-table > table > tfoot > tr > th,
  .fw-table > table > thead > tr > td,
  .fw-table > table > tbody > tr > td,
  .fw-table > table > tfoot > tr > td {
    white-space: nowrap;
  }
  /* Special overrides for the bordered tables */
  .fw-table > .table-bordered {
    border: 0;
  }
  /* Nuke the appropriate borders so that the parent can handle them */
  .fw-table > .table-bordered > thead > tr > th:first-child,
  .fw-table > .table-bordered > tbody > tr > th:first-child,
  .fw-table > .table-bordered > tfoot > tr > th:first-child,
  .fw-table > .table-bordered > thead > tr > td:first-child,
  .fw-table > .table-bordered > tbody > tr > td:first-child,
  .fw-table > .table-bordered > tfoot > tr > td:first-child {
    border-left: 0;
  }
  .fw-table > .table-bordered > thead > tr > th:last-child,
  .fw-table > .table-bordered > tbody > tr > th:last-child,
  .fw-table > .table-bordered > tfoot > tr > th:last-child,
  .fw-table > .table-bordered > thead > tr > td:last-child,
  .fw-table > .table-bordered > tbody > tr > td:last-child,
  .fw-table > .table-bordered > tfoot > tr > td:last-child {
    border-right: 0;
  }
  /* Only nuke the last row's bottom-border in `tbody` and `tfoot` since */
  /* chances are there will be only one `tr` in a `thead` and that would */
  /* remove the border altogether. */
  .fw-table > .table-bordered > tbody > tr:last-child > th,
  .fw-table > .table-bordered > tfoot > tr:last-child > th,
  .fw-table > .table-bordered > tbody > tr:last-child > td,
  .fw-table > .table-bordered > tfoot > tr:last-child > td {
    border-bottom: 0;
  }
}

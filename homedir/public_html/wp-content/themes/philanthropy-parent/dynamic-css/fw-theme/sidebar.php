/* Sidebar */
/* -------------------------------------------------- */

/* Sidebar Left */
.sidebar-left .fw-content-area {
  float: right;
}
/* Sidebar Right */
.sidebar-right .fw-content-area {
  float: left;
}
@media (min-width: 992px) {
  .sidebar-left .fw-sidebar .fw-col-inner {
    padding-right: 5%;
  }
  .sidebar-right .fw-sidebar .fw-col-inner {
    padding-left: 5%;
  }
}
@media (min-width: 1200px) {
  .sidebar-left .fw-sidebar .fw-col-inner {
    padding-right: 9%;
  }
  .sidebar-right .fw-sidebar .fw-col-inner {
    padding-left: 9%;
  }
}
/* Responsive */
/* Screen 768px */
@media (max-width: 991px) {
  .sidebar-right .fw-content-area,
  .sidebar-left .fw-content-area {
    float: none;
  }
  .fw-content-area .fw-col-inner {
    padding: 0;
  }
}
/* Screen 568px */
@media (max-width: 767px) {
  .fw-content-area .fw-col-inner {
    padding: 0;
  }
}

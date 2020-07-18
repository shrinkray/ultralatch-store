<style id="ainsley-admin-styles">
  /* ACF Styles
  * Helps to visually separate ACF blocks out when there's a lot of them.
  */
  .acf-postbox h2.hndle {
    background: #ebebeb;
    color: #424242;
    font-size: 21px !important;
  }
  .acf-postbox.closed h2.hndle {
    background: #dbdbdb;
  }
  #sub-accordion-section-misc_settings li + li {
    border-top: 1px solid #ddd;
  }
  #sub-accordion-section-misc_settings li:nth-child(2) {
    border-top: none;
  }
  li#customize-control-acf_visibility label {
    display: inline-block;
    padding-right: 15px;
  }
  td.media-icon img[src$=".svg"] {
    width: 100% !important; height: auto !important;
  }
  .acf-flexible-content > .no-value-message {
    border: 2px dashed #ffffff !important;
  }

  /* Styling for ACF fields in admin
   * All form background (sage)
   * TODO find where to use grey styles, currently unset. */
  .inside.acf-fields.-top {
    background: #d1e6ff;
  }
  /* description label */
  .acf-field .acf-label p {
    color: rgb(83, 83, 83);
    font-size: 13px;
  }
  .acf-field .acf-label p > b {git
    font-size: 14px;
  }
  /* */
  .acf-field .acf-label label {
    font-size: 15px;
  }
  /* Tab labels */
  .acf-tab-group li a  {
    font-size: 15px;
    font-weight: 200;
  }
  /* even background (sage) */
  .acf-field.even {
    background: #b4bfd5;
  }
  /* odd background (sage) */
  .acf-field.odd {
    background-color: #d6e3ef;
  }
  .acf-field {
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
  }

</style>

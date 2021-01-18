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
    border: 2px dashed rgb(33, 150, 243) !important;
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
  .acf-tab-group li.active a  {
    font-size: 15px;
    font-weight: 600;
    color: #3e96d5
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
  .display-3 .acf-input {
    font-size: 1.5rem;
  }
  .acf-input .emoji {
    padding: 1rem;
    background: rgb(255, 255, 255);
    border-radius: 50px;
  }
  /* Add icons to Category row  */
  .acf-flexible-content .layout .acf-fc-layout-handle {
    display: flex;
  }
  .acf-flexible-content .layout .acf-fc-layout-handle:before {
    color: #3e96d5;
    content: "\f538";
    font-family: "Dashicons";
    font-size: 1.3rem;
    margin-right: .5rem;
  }
  /* Allows for larger icon fontsize and auto centers on row */
  .acf-accordion .acf-accordion-title label {
    display: flex;
  }
  /* Category Help Accordion -- Adds a ? icon */
  .acf-field.acf-field-5e7a19bde2cd9 .acf-accordion-title label:before,
  .acf-field.acf-field-5e7a18cb48c28 .acf-accordion-title label:before,
  .acf-field.acf-field-5e7a9218ca743 .acf-accordion-title label:before,
  .acf-field.acf-field-5e7a197be2cd7  .acf-accordion-title label:before {
    color: #3e96d5;
    content: "\f223";
    font-family: "Dashicons";
    font-size: 1.3rem;
    margin-right: .5rem;
  }
  /* Calculator Status Fields */
  .acf-field.acf-field-5e6b7f7975e76 .acf-accordion-title label:before {
    color: #3e96d5;
    content: "\f535";
    font-family: "Dashicons";
    font-size: 1.3rem;
    margin-right: .5rem;
  }
  /* Calculator Page Layout Button*/
  .acf-field.acf-field-5e7a6c9120173  .acf-accordion-title label:before {
    color: #3e96d5;
    content: "\f314";
    font-family: "Dashicons";
    font-size: 1.3rem;
    margin-right: .5rem;
  }
  .acf-tab-button[data-key="field_5e6b8cd945a68"],
  .acf-tab-button[data-key="field_5e6b808a75e78"],
  .acf-tab-button[data-key="field_5e7a6bbc563ca"] {
    background-color: lightgoldenrodyellow !important;
    font-weight: 500;
  }
  .pale-yellow-field .acf-input-wrap input {
    background-color: lightgoldenrodyellow;
  }
  .acf-field-message {
    background: #94d2ff;
  }
  /* Styling inline Links inside the Message field */
  .acf-field-message a {
    color: darkred;
    background-color: rgb(255, 255, 255);
    padding: 0 .25rem;
    border-radius: 20px;
    text-decoration: none;
    padding-left: .5rem;
  }
  .acf-field-message a:before {
    content: '\f103';
    font-family: "Dashicons";
    margin-right: .2rem;
    position: relative;
    top: 2px;
  }
  .acf-field-message.secondary-message-field {
    background: #94d2ff;
  }
  #titlediv #title {
    background: #fffad7 !important;
  }
  .acf-range-wrap input[type="number"] {
    min-width: 4em !important;
  }
  #edittag {
    max-width: 100%;
  }
  .taxonomy-product_cat .form-table tbody  {
  }
</style>

<!-- Event snippet for SS: Pinnacle Lodging Form Submission conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-989134662/F9cSCOWXkrkZEMb-09cD'});
</script>

<!-- Event snippet for SS: Projection conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-989134662/DVfTCM2YuI4dEMb-09cD'});
</script>

<?php

add_filter('gform_confirmation', function ($confirmation, $form) {
    $isRedirect = isset($confirmation['redirect']) && $confirmation['redirect'];

    $trackingCode = "<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: 'FormSubmission',
        formId: 'gf_{$form['id']}',
        formName: '{$form['title']}'"
        . ($isRedirect ? ",\neventCallback: function(){window.location.href = '" . esc_url_raw($confirmation['redirect']) . "';}" : "") . "
    });
</script>";

    if ($isRedirect) {
        $confirmation = $trackingCode;
    } else {
        $confirmation .= $trackingCode;
    }

    return $confirmation;
}, 10, 2);


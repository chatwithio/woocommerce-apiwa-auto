<?php
/**
 * Admin scripts and styles class.
 *
 * @package WOOAWA\Admin
 * @version 1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WOOAWA_Admin_Scripts class.
 *
 * @since 1.0.0
 */
class WOOAWA_Admin_Scripts {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0.0
	 *
	 * @param string $hook The current admin page.
	 * @return void
	 */
	public function admin_enqueue_scripts( $hook ) {
		// Check if we are on the plugin page.
		if ( 'toplevel_page_wooawa' !== $hook && 'api-wa-auto_page_wooawa-logs' !== $hook ) {
			return;
		}

		// Enqueue media.
		wp_enqueue_media();

		// Enqueue styles and scripts.
		wp_enqueue_style( 'wooawa-admin', WOOAWA_PLUGIN_URL . '/assets/css/wooawa-admin.css', array(), WOOAWA_PLUGIN_VERSION );
		wp_enqueue_script( 'wooawa-admin', WOOAWA_PLUGIN_URL . '/assets/js/wooawa-admin.js', array( 'jquery' ), WOOAWA_PLUGIN_VERSION, true );

		wp_localize_script(
			'wooawa-admin',
			'wooawa_admin_params',
			array(
				'i18n' => array(
					'templates' => array(
						'en' => array(
							'wc-pending'    => 'Hello {{1}}! Your order #[{{2}}] from {{3}} is pending payment. Please complete the payment to proceed with processing. Note: Please do not reply to this message.',
							'wc-processing' => 'Hello {{1}}! Your order #[{{2}}] from {{3}} is being processed. We will notify you as soon as it\'s ready for shipping. Note: Please do not reply to this message.',
							'wc-on-hold'    => 'Hello {{1}}, your order #[{{2}}] from {{3}} is on hold. We are reviewing the details and will notify you of any updates. Note: Please do not reply to this message.',
							'wc-completed'  => 'Congratulations, {{1}}! Your order #[{{2}}] from {{3}} has been completed and shipped. We hope you enjoy your purchase! Note: Please do not reply to this message.',
							'wc-cancelled'  => 'Hello {{1}}, we want to inform you that your order #[{{2}}] from {{3}} has been canceled. If you have any questions, feel free to contact us. Note: Please do not reply to this message.',
							'wc-refunded'   => 'Hello {{1}}! We inform you that we have processed the refund for your order #[{{2}}] from {{3}}. Please allow a few business days for the amount to reflect in your account. Note: Please do not reply to this message.',
							'wc-failed'     => 'Hello {{1}}, we regret to inform you that your order #[{{2}}] from {{3}} has failed. Please contact our support team for further assistance. Note: Please do not reply to this message.',
						),
						'fr' => array(
							'wc-pending'    => 'Bonjour {{1}}! Votre commande n°[{{2}}] de {{3}} est en attente de paiement. Veuillez effectuer le paiement pour procéder au traitement. Note : Veuillez ne pas répondre à ce message.',
							'wc-processing' => 'Bonjour {{1}}! Votre commande n°[{{2}}] de {{3}} est en cours de traitement. Nous vous informerons dès qu\'elle sera prête à être expédiée. Note : Veuillez ne pas répondre à ce message.',
							'wc-on-hold'    => 'Bonjour {{1}}, votre commande n°[{{2}}] de {{3}} est en attente. Nous examinons les détails et vous notifierons de toute mise à jour. Note : Veuillez ne pas répondre à ce message.',
							'wc-completed'  => 'Félicitations, {{1}}! Votre commande n°[{{2}}] de {{3}} a été complétée et expédiée. Nous espérons que vous apprécierez votre achat! Note : Veuillez ne pas répondre à ce message.',
							'wc-cancelled'  => 'Bonjour {{1}}, nous tenons à vous informer que votre commande n°[{{2}}] de {{3}} a été annulée. Si vous avez des questions, n\'hésitez pas à nous contacter. Note : Veuillez ne pas répondre à ce message.',
							'wc-refunded'   => 'Bonjour {{1}}! Nous vous informons que nous avons traité le remboursement pour votre commande n°[{{2}}] de {{3}}. Veuillez permettre quelques jours ouvrables pour que le montant soit reflété sur votre compte. Note : Veuillez ne pas répondre à ce message.',
							'wc-failed'     => 'Bonjour {{1}}, nous avons le regret de vous informer que votre commande n°[{{2}}] de {{3}} a échoué. Veuillez contacter notre équipe de support pour obtenir plus d\'aide. Note : Veuillez ne pas répondre à ce message.',
						),
						'es' => array(
							'wc-pending'    => 'Hola {{1}}! Tu pedido #[{{2}}] de {{3}} está pendiente de pago. Por favor, completa el pago para proceder con el procesamiento. Nota: Por favor, no respondas a este mensaje.						',
							'wc-processing' => '¡Hola {{1}}! Tu pedido #[{{2}}] de {{3}} está siendo procesado. Te informaremos tan pronto como esté listo para su envío. Nota: Por favor, no respondas a este mensaje.',
							'wc-on-hold'    => 'Hola {{1}}, tu pedido #[{{2}}] de {{3}} está en espera. Estamos revisando los detalles y te notificaremos de cualquier actualización. Nota: Por favor, no respondas a este mensaje.',
							'wc-completed'  => '¡Felicidades, {{1}}! Tu pedido #[{{2}}] de {{3}} ha sido completado y enviado. ¡Esperamos que disfrutes de tu compra! Nota: Por favor, no respondas a este mensaje.',
							'wc-cancelled'  => ' Hola {{1}}, queremos informarte que tu pedido #[{{2}}] de {{3}} ha sido cancelado. Si tienes alguna pregunta, no dudes en contactarnos. Nota: Por favor, no respondas a este mensaje.',
							'wc-refunded'   => '¡Hola {{1}}! Te informamos que hemos procesado el reembolso para tu pedido #[{{2}}] de {{3}}. Por favor, permite unos días hábiles para que el monto se refleje en tu cuenta. Nota: Por favor, no respondas a este mensaje.',
							'wc-failed'     => 'Hola {{1}}, lamentamos informarte que tu pedido #[{{2}}] de {{3}} ha fallado. Por favor, contacta a nuestro equipo de soporte para obtener más ayuda. Nota: Por favor, no respondas a este mensaje.',
						),
						'pt' => array(
							'wc-pending'    => 'Olá {{1}}! Seu pedido #[{{2}}] de {{3}} está pendente de pagamento. Por favor, complete o pagamento para prosseguir com o processamento. Nota: Por favor, não responda a esta mensagem.',
							'wc-processing' => 'Olá {{1}}! Seu pedido #[{{2}}] de {{3}} está sendo processado. Iremos notificá-lo assim que estiver pronto para envio. Nota: Por favor, não responda a esta mensagem.',
							'wc-on-hold'    => 'Olá {{1}}, seu pedido #[{{2}}] de {{3}} está em espera. Estamos revisando os detalhes e o notificaremos de quaisquer atualizações. Nota: Por favor, não responda a esta mensagem.',
							'wc-completed'  => 'Parabéns, {{1}}! Seu pedido #[{{2}}] de {{3}} foi concluído e enviado. Esperamos que você aproveite sua compra! Nota: Por favor, não responda a esta mensagem.',
							'wc-cancelled'  => 'Olá {{1}}, queremos informar que seu pedido #[{{2}}] de {{3}} foi cancelado. Se você tiver alguma dúvida, sinta-se à vontade para entrar em contato conosco. Nota: Por favor, não responda a esta mensagem.',
							'wc-refunded'   => 'Olá {{1}}! Informamos que processamos o reembolso para o seu pedido #[{{2}}] de {{3}}. Por favor, permita alguns dias úteis para que o valor seja refletido em sua conta. Nota: Por favor, não responda a esta mensagem.',
							'wc-failed'     => 'Olá {{1}}, lamentamos informar que seu pedido #[{{2}}] de {{3}} falhou. Por favor, entre em contato com nossa equipe de suporte para obter mais assistência. Nota: Por favor, não responda a esta mensagem.',
						),
					),
				),
			)
		);
	}
}

return new WOOAWA_Admin_Scripts();

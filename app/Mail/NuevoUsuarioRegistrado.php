<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NuevoUsuarioRegistrado extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Crear una nueva instancia de mensaje de correo.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        // Formatear el RUT
        $this->user->rut = $this->formatRut($this->user->rut);
    }

    /**
     * Función para formatear el RUT.
     */
    private function formatRut($rut)
    {
        // Elimina todo lo que no sea número o K
        $rut = preg_replace('/[^0-9kK]/', '', $rut);
        $dv = substr($rut, -1); // Dígito verificador
        $cuerpo = substr($rut, 0, -1); // Cuerpo del RUT

        // Aplica puntos cada tres dígitos
        $cuerpo = number_format($cuerpo, 0, '', '.');

        return "{$cuerpo}-{$dv}";
    }

    /**
     * Obtener el sobre del mensaje.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo Usuario Registrado',
        );
    }

    /**
     * Obtener la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.nuevo-usuario', // Asegúrate de crear esta vista
        );
    }

    /**
     * Obtener los adjuntos del mensaje.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

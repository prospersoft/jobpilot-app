<?php
namespace App\Notifications;

use App\Models\FollowUp;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FollowUpReminder extends Notification
{
    use Queueable;

    public function __construct(
        protected FollowUp $followUp
    ) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $application = $this->followUp->application;
        
        return (new MailMessage)
            ->subject('Follow Up Reminder: ' . $application->company_name)
            ->line("It's time to follow up on your application at {$application->company_name}.")
            ->line("Position: {$application->job_title}")
            ->line("Status: " . ucfirst($application->status))
            ->action('View Application', route('applications.show', $application))
            ->line('Good luck with your job search!');
    }
}
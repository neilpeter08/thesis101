<?php

use Carbon\Carbon;



?>

<html>

  <table border = 1>
  <tr>
    <th>Student Code</th>
    <th>Student Name</th>
    <th>Software Category</th>
    <th>Math Performance</th>
    <th>No. of Problems Solved</th>
    <th>No. of Problems Unsolved</th>
    <th>No. of hints</th>
    <th>Hints Said</th>
    <th>Emotions Exhibited</th>
    <th>Time Spent</th>
    <th>Average Time Spent For Each Equation</th>
  </tr>
<?php $ctrCorrect =  0; ?>
<?php $ctrWrong =  0 ?>
<?php $hints_used = "" ?>

<?php $responses = array("Good Job!",
                       "Keep it up!",
                       "You're doing great.",
                       "Nice",
                       "You're one of a kind!",
                       "Very Good!",
                       "Congratulations!",
                       "Congrats!",
                       "You're doing a pretty good job",
                       "Well Played!",
                       "That's the way to do it!",
                       "Amazing! That's right!",
                       "Yahoo! You're pretty good.") ?>
  @foreach ($logs as $log)
    <tr>
    <td>{!! $log->student_number !!}</td>
    <td>{!! $log->first_name . " " . $log->last_name !!}
    <td>{!! $log->student_group !!}</td>
    <td>High</td>
    <td>{!! $log->equations()->where('status', '=', 'finished')->count() !!}</td>
    <td>{!! $log->equations()->where('status', '=', 'abandoned')->count() !!}</td>
    <td>{!! $log->hints->count() !!}</td>
    <?php $chat = "" ?>
    @foreach ($log->piaLogs as $pl)
    @if (!in_array($pl->reaction, $responses))
      <?php $chat = $chat . $pl->reaction . "," ?>
    @endif
    @endforeach
    <td>{!! $chat !!}</td>
    <?php $hints = ""; ?>
    <?php $sum = 0 ?>
    @foreach ($log->equations as $e)
    <?php $e->status == 'finished' ? $sum += (strtotime($e->time_finished) - strtotime($e->time_started)) : "" ?>
      @foreach ($e->logs as $em)

        <?php $hints = $hints . $em->emotion . "," ?>
      @endforeach

    @endforeach
<td>{!! $hints !!}</td>
<td>{!! $sum !!}</td>
<td>{!! $log->equations->count() == 0 ? 0 : $sum/$log->equations->count() !!}</td>
  @endforeach

  </table>
</html>
